@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\PROGRAMMING LANGUAGES\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\ingres\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\ingres\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\mysql\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\mysql\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\postgresql\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\apache\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\apache\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\openoffice\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\apache-tomcat\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\resin\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\resin\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\jetty\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\jetty\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\subversion\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\PROGRAMMING LANGUAGES\XAMPP\lucene\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\lucene\scripts\ctl.bat START)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\third_application\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\PROGRAMMING LANGUAGES\XAMPP\third_application\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\third_application\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\lucene\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\PROGRAMMING LANGUAGES\XAMPP\subversion\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\subversion\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\jetty\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\jetty\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\hypersonic\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\resin\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\resin\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\PROGRAMMING LANGUAGES\XAMPP\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\openoffice\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\openoffice\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\apache\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\apache\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\ingres\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\ingres\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\mysql\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\mysql\scripts\ctl.bat STOP)
if exist D:\PROGRAMMING LANGUAGES\XAMPP\postgresql\scripts\ctl.bat (start /MIN /B D:\PROGRAMMING LANGUAGES\XAMPP\postgresql\scripts\ctl.bat STOP)

:end

