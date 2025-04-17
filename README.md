# php-test
```shell
sudo apt update
sudo apt install mysql-server
sudo apt install php php-cli php-mysql


sudo systemctl status mysql
sudo systemctl start mysql



# If System has not been booted with systemd as init system
sudo /usr/sbin/mysqld &

# If have permission problem
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld
sudo chmod 755 /var/run/mysqld


```
