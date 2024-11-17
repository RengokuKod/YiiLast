<?php

namespace app\controllers;

use app\models\Rabotnik;
use app\models\RabotnikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * RabotnikController implements the CRUD actions for Rabotnik model.
 */
class RabotnikController extends Controller
{
    public function Autorabotnik()
    {
    if (Rabotnik::find()->exists()) {
    return $this->redirect(['index']);// Если таблица не пуста, прекратить выполнение скрипта
    }
    
    $fileName = './Base/rabotnik.txt'; // Замените на путь к вашему файлу
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
    
    $photoDir ='./auto/rabotnik'; // Замените на путь к вашей папке с фотографиями
    $photos = glob($photoDir . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    foreach ($data as $row) {
    $model = new Rabotnik();
    $model->Фамилия = $row[0];
    $model->Имя = $row[1];
    $model->Отчество = $row[2];
    $model->Рост = $row[3];
    $model->Должность = $row[4];
    $model->Стаж = $row[5] ;
    $model->Зона_работ = $row[6];
    $model->Образование = $row[7] ;
    $model->Возраст = $row[8];
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
     * Lists all Rabotnik models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Rabotnik::find()->exists()) {
        $searchModel = new RabotnikSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    else{RabotnikController::Autorabotnik();}
    }

    /**
     * Displays a single Rabotnik model.
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
     * Creates a new Rabotnik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
    $model = new Rabotnik();
    if (Yii::$app->request->isPost) {
    $model->load(Yii::$app->request->post());
    $image = UploadedFile::getInstance($model, 'Фото');
    $path = Yii::getAlias('@webroot') . "/save/rabotnik/{$image->baseName}.{$image->extension}";
    $image->saveAs($path);
    $model->Фото = "/save/rabotnik/{$image->baseName}.{$image->extension}";
    $model->save(false);
    return $this->redirect(['view', 'id' => $model->id]);
    }
    else {
    $model->loadDefaultValues();
    }
    return $this->render('create', [
    'model' => $model,
    ]);
    }

    /**
     * Updates an existing Rabotnik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost) {
            $model->load($this->request->post());
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
// Обработка загрузки файла
$image = UploadedFile::getInstance($model, 'Фото');
if ($image) {
$fileName = 'save/rabotnik/' . $image->baseName . '.' . $image->extension;
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
     * Deletes an existing Rabotnik model.
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
     * Finds the Rabotnik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Rabotnik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rabotnik::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
