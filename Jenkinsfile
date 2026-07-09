pipeline {

    agent any


    stages {


        stage('Checkout') {

            steps {

                checkout scm

            }

        }



        stage('Install Dependencies') {

            steps {

                bat '''
                 C:\\ProgramData\\ComposerSetup\\bin\\composer.bat install
                '''

            }

        }



        stage('Run Tests') {

            steps {

                echo "Running PHP Unit Tests..."

                bat '''
                vendor\\bin\\phpunit tests
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

            echo 'Deployment failed - check test results'

        }

    }

}