stage('Deploy') {
    steps {
        bat '''
        echo Deploying...

        xcopy /E /I /Y * D:\\Deploy\\test-app
        '''
    }
}
