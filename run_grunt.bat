CD /D %~dp0
call npm install
call npm install grunt --save-dev
call grunt
cmd 