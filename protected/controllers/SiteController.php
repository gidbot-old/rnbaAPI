<?php

class SiteController extends Controller
{

    public function actionIndex()
    {
        $model = new NbaPost();

        $this->_ajaxValidation($model, 'post-form');

        if (!empty($_POST['NbaPost'])) {
            $attributes = $_POST['NbaPost'];
            $model->setAttributes($attributes);
            $model->postNumber = $this->getSize() +1;

            $criteria = new EMongoCriteria();
            $criteria->user_name = 'admin';
            $user = User::model()->find($criteria);

            if (CPasswordHelper::verifyPassword($model->password, $user->password)) {
                if($model->save()){
                    $this->redirect(array('getCurrent'));
                }
            } else {
                echo 'Error: Incorrect Password';
                die();
            }


        }

        $this->render('add', array('model'=>$model));
    }

    public function getSize(){
        return NbaPost::model()->count();
    }

    public function actionGetCurrent(){
        $post = NbaPost::model()->findByAttributes(array('postNumber'=>$this->getSize()));
        echo json_encode($post);
        Yii::app()->end();

    }

    public function actionSaveUser() {
        $user = new User();
        if ($user->save()){
            echo 'Success';
            var_dump($user); die();
        }
    }

    /**
     * @param $model
     * @param $form_id
     */
    protected function _ajaxValidation($model, $form_id)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $form_id) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}