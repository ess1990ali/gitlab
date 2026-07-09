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

                bat '''
                php tests\\login_test.php
                '''

            }

        }


    }


}