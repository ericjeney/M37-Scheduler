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
	 * Displays the feedback page
	 */
	public function actionFeedback()
	{
		$model=new FeedbackForm;
		if(isset($_POST['FeedbackForm']))
		{
			$model->attributes=$_POST['FeedbackForm'];
			if($model->validate())
			{
				$model->sendFeedback();
				Yii::app()->user->setFlash('feedback','Thank you for providing us with feedback!');
				$this->refresh();
			}
		}
		$this->render('feedback',array('model'=>$model));
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
		if(!Yii::app()->user->isGuest) {
			$assignment = Assignment::currentAssignment();
			if ($assignment == null || $assignment->status <= 1)
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
		} else {
			Yii::app()->user->setFlash('error', 'You must login first!');
			$this->redirect(array('site/login'));
		}
	}
	
	public function actionBecomeUser()
	{
		if(Yii::app()->user->getState("admin", false) != false)
		{
			$model = new BecomeUserForm;
			
			if(isset($_POST['BecomeUserForm']))
			{
				$model->attributes=$_POST['BecomeUserForm'];
				if($model->validate())
				{
					$model->becomeUser();
					$this->actionIndex();
					return;
				}
			}
			
			$this->render('becomeUser', array('model'=>$model));
		}else {
			$this->actionIndex();
		}
	}
}
