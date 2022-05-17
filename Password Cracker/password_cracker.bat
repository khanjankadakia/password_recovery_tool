@echo off
setlocal ENABLEDELAYEDEXPANSION
set hashtype=0
title "Password Cracker"
echo Select the type of file you want to crack:
echo 1. WPA2
echo 2. WinZip
echo 3. Microsoft Office Files
echo 4. PDF File
set /P choice=Enter your choice:

setlocal
set "ps=Add-Type -AssemblyName System.windows.forms | Out-Null;"
set "ps=%ps% $f=New-Object System.Windows.Forms.OpenFileDialog;"
set "ps=%ps% $f.Filter='All Files(*.*)';"
set "ps=%ps% $f.showHelp=$true;"
set "ps=%ps% $f.ShowDialog() | Out-Null;"
set "ps=%ps% $f.FileName"

echo Choose the file whose password needs to be cracked:
for /F "tokens=* usebackq" %%a in (`powershell "%ps%"`) do if not "%%a" == "Cancel" if not "%%a" == "OK" set filename=%%a
echo Selected File: !filename!

if "%choice%"=="1" goto wpa2
if "%choice%"=="2" goto zip
if "%choice%"=="3" goto office
if "%choice%"=="4" goto pdf

:wpa2
set hashtype=22000
hashcat.exe -m !hashtype! -a 3 "%filename%" ?l?l?l?l?l?l?l?l

:zip
set hashtype=17200
cd "C:/xampp/htdocs/Password Recovery Tool/Password Cracker/john-1.9.0-jumbo-1-win64/run"
zip2john.exe "%filename%" > zip.tmp
cat zip.tmp | grep -E -o '(\$pkzip2\$.*\$/pkzip2\$)|(\$zip2\$.*\$/zip2\$)' > zip.hash
cd "C:/xampp/htdocs/Password Recovery Tool/Password Cracker"
hashcat.exe -m !hashtype! -a 3 zip.hash ?d?d?d?d?d?d?d?d?d?d

:office
exit

:pdf
set hashtype=10500
cd "C:/xampp/htdocs/Password Recovery Tool/Password Cracker/john-1.9.0-jumbo-1-win64/run"
perl pdf2john.pl "%filename%" > abc.txt
set /p hashfile=<abc.txt
set hash1=!filename:\=/!
set hash2=!hashfile:*.pdf:=!
cd "C:/xampp/htdocs/Password Recovery Tool/Password Cracker"
hashcat.exe -m !hashtype! -a 3 !hash2! ?d?d/?d?d/?d?d?d?d
set /p password=<hashcat.potfile
echo !password:=!
pause