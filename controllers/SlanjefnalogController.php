<?php

namespace app\controllers;

use Yii;
use app\models\Slanjefnalog;
use app\models\SlanjefnalogSearch;
use app\models\Slanjefajlovi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SlanjefnalogController implements the CRUD actions for Slanjefnalog model.
 */
class SlanjefnalogController extends Controller
{
    private $from = 'entel_exchange@ep-entel.com';
    private $receiver_email = 'johnnyetf@gmail.com';
    private $to_bcc = 'ngolubovic@ep-entel.com';
    private $subject = 'Neki naslov 123';
    private $content = 'Sadrzaj poruke. Sadrzaj poruke. Sadrzaj poruke. Sadrzaj poruke. 
                        Sadrzaj poruke. Sadrzaj poruke. Sadrzaj poruke. Sadrzaj poruke. Sadrzaj poruke. ';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slanjefnalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlanjefnalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slanjefnalog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Slanjefnalog model.
     * @param integer $id
     * @return mixed
     */
    public function actionSendemail($type = 'test', $params = null)
    {
        #$model = new Emails();

        #if ( $model->load(Yii::$app->request->post()) )
        #{
            // upload the attachment
            #$model->attachment = UploadedFile::getInstance($model, 'attachment');

            #if( $model->attachment )
            #{
            #    $time = time();
            #    $model->attachment->saveAs('attachments/'.$time.'.'.$model->attachment->extension);
            #    $model->attachment = 'attachments/'.$time.'.'.$model->attachment->extension;
            #}

            #if( $model->attachment )
            #{
                $value = Yii::$app->mailer->compose($type, ['params' => $params])
                    //->setFrom([ $student->email => $student->name ])
                    //->setFrom([ "nikola@tesla.com" => "Nikola Tesla" ])
                    ->setFrom($this->from)
                    ->setTo( $this->receiver_email )
                    ->setBcc( $this->to_bcc )
                    ->setSubject( $this->subject )
                    ->setHtmlBody( $this->content.'<br><br>'.'Attachement: '."<a href='https://yii2-vezba-golux.c9users.io/web/$model->attachment'>".$model->attachment.'</a>' )
                    #->attach( $model->attachment )
                    ->send();
            #}
            #else
            #{
            #    $value = Yii::$app->mailer->compose()
            #        ->setFrom($this->from)
            #        ->setTo( $model->receiver_email )
            #        ->setSubject( $model->subject )
            #        ->setHtmlBody( $model->content )
            #        ->send();
            #}

            #$model->save();
            return $this->redirect(['index']);
        #} else {
        #    return $this->render('create', [
        #        'model' => $model,
        #    ]);
        #}
    }

    /**
     * Creates a new Slanjefnalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slanjefnalog();
        $model_fajlovi = new Slanjefajlovi();

        $model->id_entel = '5';



        if ( $model->load(Yii::$app->request->post()) && $model_fajlovi->load(Yii::$app->request->post()) ) {

            $model_fajlovi->ime_fajla = UploadedFile::getInstance($model_fajlovi, 'ime_fajla');

            if( $model_fajlovi->ime_fajla )
            {
                $time = time();
                $model_fajlovi->ime_fajla->saveAs('attachments/'.$time.'.'.$model_fajlovi->ime_fajla->extension);
                $model_fajlovi->ime_fajla = 'attachments/'.$time.'.'.$model_fajlovi->ime_fajla->extension;
            }
            if( $model_fajlovi->ime_fajla )
            {
                $value = Yii::$app->mailer->compose($type, ['params' => $params])
                    //->setFrom([ $student->email => $student->name ])
                    //->setFrom([ "nikola@tesla.com" => "Nikola Tesla" ])
                    ->setFrom($this->from)
                    ->setTo( $this->receiver_email )
                    ->setBcc( $this->to_bcc )
                    ->setSubject( $this->subject )
                    ->setHtmlBody( $model->napomena.'<br><br>'.'Attachement: '."<a href='http://10.1.2.181/slanjefnalog-yii2/web/$model_fajlovi->ime_fajla'>".$model_fajlovi->ime_fajla.'</a>' )
                    ->attach( $model_fajlovi->ime_fajla )
                    ->send();
            }

            $model->save();
            $model_fajlovi->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_fajlovi' => $model_fajlovi,
            ]);
        }
    }

    /**
     * Updates an existing Slanjefnalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slanjefnalog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slanjefnalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slanjefnalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slanjefnalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
