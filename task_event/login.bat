
@echo off
Title Start and Kill Internet Explorer
Mode con cols=75 lines=5 & color 0B
echo(
echo                     Launching Internet Explorer ...
Start /min "" "%ProgramFiles%\Internet Explorer\iexplore.exe"  "http://127.0.0.1/ToolsHos/web/index.php?r=site/auto-login" 
:: Sleep for 10 seconds, you can change the SleepTime variable
set SleepTime=10
Timeout /T %SleepTime% /NoBreak>NUL
Cls & Color 0C
echo(
echo              Killing Internet Explorer Please wait for a while ...
Taskkill /IM "iexplore.exe" /F