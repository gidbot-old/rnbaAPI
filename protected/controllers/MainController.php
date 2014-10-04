<?php
/**
 * MainController is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class MainController extends Controller
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    /**
     * @param string $id
     * @param string|EMongoDocument $modelClass
     * @return EMongoDocument
     * @throws CHttpException
     */
    protected function _loadModel($id, $modelClass)
    {
        $model = $modelClass::model()->findByPk(new MongoId($id));

        if ($model === null) {
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
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