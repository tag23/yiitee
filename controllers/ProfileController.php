<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 10:34 PM
 */

namespace app\controllers;
use app\models\EditProfileForm;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;


class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }

    public function actionEdit() {
        //$model = $this->findModel();
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile/index']);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }*/
        $model = new EditProfileForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->attributes = Yii::$app->request->post('EditProfileForm');
            $model->image = UploadedFile::getInstance($model, 'imageFile');
            if ($model->update($model->image)) {
                return $this->redirect(['profile/index']);
            }
        }else {
                return $this->render('edit', [
                    'model' => $model,
                ]);
            }
        }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}