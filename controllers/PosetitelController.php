<?php

namespace app\controllers;

use app\models\Posetitel;
use app\models\PosetitelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * PosetitelController implements the CRUD actions for Posetitel model.
 */
class PosetitelController extends Controller
{
    public function Autoposetitel()
    {
    if (Posetitel::find()->exists()) {
    return $this->redirect(['index']);// Если таблица не пуста, прекратить выполнение скрипта
    }
    
    $fileName = './Base/posetitel.txt'; // Замените на путь к вашему файлу
    $file = fopen($fileName, 'r');
    $data = [];
    
    if ($file) {
    while (($line = fgets($file)) !== false) {
    $values = explode(';', $line); // Разделитель зависит от формата вашего файла
    $data[] = $values;
    }
    fclose($file);
    } else {
    // Ошибка при открытии файла
    echo "Не удалось открыть файл $fileName";
    return;
    }
    
    $photoDir ='./auto/posetitel'; // Замените на путь к вашей папке с фотографиями
    $photos = glob($photoDir . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    foreach ($data as $row) {
    $model = new Posetitel();
    $model->Фамилия = $row[0];
    $model->Имя = $row[1];
    $model->Отчество = $row[2];
    $model->Возраст = $row[3];
    $model->Сумма_заказа = $row[4];
    $model->Количество_товаров = $row[5] ;
    $model->Тип_заказа = $row[6];
    $model->Материал = $row[7] ;
    $model->Способ_оплаты = $row[8];
    $model->Фото = $photos[array_rand($photos)]; // Выбор случайного фото
    $model->save(false);
    }
    return $this->redirect(['index']);
    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    /**
     * Lists all Posetitel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Posetitel::find()->exists()) {
            $searchModel = new PosetitelSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
      else{
        PosetitelController::Autoposetitel();
      }
    }

    /**
     * Displays a single Posetitel model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Posetitel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
    $model = new Posetitel();
    if (Yii::$app->request->isPost) {
    $model->load(Yii::$app->request->post());
    $image = UploadedFile::getInstance($model, 'Фото');
    $path = Yii::getAlias('@webroot') . "/save/posetitel/{$image->baseName}.{$image->extension}";
    $image->saveAs($path);
    $model->Фото = "/save/posetitel/{$image->baseName}.{$image->extension}";
    $model->save(false);
    return $this->redirect(['view', 'id' => $model->id]);
    } else {
    $model->loadDefaultValues();
    }
    return $this->render('create', [
    'model' => $model,
    ]);
    }
    /**
     * Updates an existing Posetitel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionUpdate($id)
    {
    $model = $this->findModel($id);

    if ($this->request->isPost) {
    $model->load($this->request->post());

    // Обработка загрузки файла
    $image = UploadedFile::getInstance($model, 'Фото');
    if ($image) {
    $fileName = 'save/posetitel/' . $image->baseName . '.' . $image->extension;
    $image->saveAs($fileName);
    $model->Фото = '/'.$fileName; // сохранение пути к изображению в модели
    }

    if ($model->validate() && $model->save()) {
    return $this->redirect(['view', 'id' => $model->id]);
    }
    }

    return $this->render('update', [
    'model' => $model,
    ]);
    }


    /**
     * Deletes an existing Posetitel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posetitel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Posetitel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posetitel::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
