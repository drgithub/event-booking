# event-booking
Event Booking

To set up:

Requirements: 
```
Xampp must installed.
Git must installed.
Composer must installed.
```

Steps:
1. Clone the project in your machine:
    In terminal, go to \xampp\htdocs and run `git clone git@github.com:ralphdev22/event-booking.git`
2. After cloning the project. Go inside to it by running this command `cd event-booking`
3. Make sure you are already inside in the project and run these ff:
```
a. composer i
b. php artisan migrate
c. php artisan key:generate
```

4. in your `.env` replace your mailer config to
`MAIL_DRIVER=smtp`  
`MAIL_HOST=smtp.googlemail.com`  
`MAIL_PORT=465`  
`MAIL_USERNAME=eventbookingrd22@gmail.com`  
`MAIL_PASSWORD=Admin123!`  
`MAIL_ENCRYPTION=ssl`  

5. Open Notepad in Administrato and open hosts file with it from `C:\Windows\System32\drivers\etc`. And and this line at the end `127.0.0.1 event-booking.localhost` and save.

6. Open `httpd-vhosts.conf` from your /xampp/apache/conf/extra derictory folder and add this lines at the end and save it.
```
<VirtualHost *:80>
  ServerAdmin webmaster@localhost.com
  DocumentRoot E:/xampp/htdocs/event-booking/public
  ServerName event-booking.localhost
</VirtualHost>
```

7. Open your xampp or restart apache
