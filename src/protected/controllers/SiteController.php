<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
		if(Yii::app()->user->isGuest) {
			$this->actionLogin();
		}else if(Yii::app()->user->getState("email", "") == "") {
			$this->actionEditDetails();
		}else if(Yii::app()->user->getState("admin", false) != false) {
			$this->render('admin');
		}else if(Assignment::model()->currentAssignment() == null) {
			$this->actionPicker();
		}else {
			$this->render('index');
			//$this->actionPicker();
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionEditDetails()
	{
		$model = new DetailsForm;
		if(isset($_POST['DetailsForm'])) {
			$model -> attributes=$_POST['DetailsForm'];
			if($model->validate() && $model->editDetails()) {
				$this->actionIndex();
				return;
			}
		}
		
		$this->render('details', array('model'=>$model));
	}
	
	public function actionPicker()
	{
		$assignment = Assignment::currentAssignment();
		if ($assignment->status <= 1)
		{
			$model=new AssignmentForm;
			if(isset($_POST['AssignmentForm']))
			{
				$model->attributes=$_POST['AssignmentForm'];
				if($model->validate() && $model->editAssignment())
				{
					$this->render('index');
					return;
				}
			}

			$this->render('picker',array('model'=>$model));
		}else {
			$this->render('index');
		}
	}
}
