pipeline {

    agent any


    stages {


        stage('Checkout') {

            steps {

                checkout scm

            }

        }



        stage('Run Tests') {

            steps {

                echo "Running PHP tests..."

                bat '''
                
                echo Checking PHP syntax...

                php -l src\\index.php

                php -l src\\register.php


                echo Checking required files...

                if not exist src\\index.php (
                    echo ERROR: index.php missing
                    exit /b 1
                )


                if not exist src\\register.php (
                    echo ERROR: register.php missing
                    exit /b 1
                )


                echo Basic tests passed successfully

                '''

            }

        }



        stage('Deploy to UAT') {

            steps {

                bat '''
                if exist C:\\inetpub\\wwwroot\\WebSites\\UAT\\MyApp (
                    rmdir /S /Q C:\\inetpub\\wwwroot\\WebSites\\UAT\\MyApp
                )

                mkdir C:\\inetpub\\wwwroot\\WebSites\\UAT\\MyApp

                xcopy src C:\\inetpub\\wwwroot\\WebSites\\UAT\\MyApp /E /I /Y
                '''

            }

        }



        stage('Approval') {

            steps {

                input 'Deploy to Production?'

            }

        }



        stage('Deploy Production') {

            steps {

                bat '''
                if exist C:\\inetpub\\wwwroot\\WebSites\\Production\\MyApp (
                    rmdir /S /Q C:\\inetpub\\wwwroot\\WebSites\\Production\\MyApp
                )

                mkdir C:\\inetpub\\wwwroot\\WebSites\\Production\\MyApp

                xcopy src C:\\inetpub\\wwwroot\\WebSites\\Production\\MyApp /E /I /Y
                '''

            }

        }


    }


    post {

        success {

            echo 'Deployment completed successfully'

        }


        failure {

            echo 'Deployment failed'

        }

    }

}