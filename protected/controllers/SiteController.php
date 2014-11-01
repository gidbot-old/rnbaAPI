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
            if($model->save()){
                $this->redirect(array('getCurrent'));
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