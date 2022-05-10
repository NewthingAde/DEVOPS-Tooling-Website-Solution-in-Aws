# DEVOPS-TOOLING-WEBSITE-SOLUTION

In this project I will be implementing the follwoing tool in a single DevOps Tooling Solution that will consist of:

**Jenkins** – free and open source automation server used to build CI/CD pipelines.

**Kubernetes** – an open-source container-orchestration system for automating computer application deployment, scaling, and management.

**Jfrog Artifactory** – Universal Repository Manager supporting all major packaging formats, build tools and CI servers. Artifactory.

**Rancher** – an open source software platform that enables organizations to run and manage Docker and Kubernetes in production.

**Grafana** – a multi-platform open source analytics and interactive visualization web application.

**Prometheus** – An open-source monitoring system with a dimensional data model, flexible query language, efficient time series database and modern alerting approach.

**Kibana** – Kibana is a free and open user interface that lets you visualize your Elasticsearch data and

In this project I implemented a solution that consists of following components:

  1. Infrastructure: AWS
  2. Webserver Linux: Red Hat Enterprise Linux 8
  3. Database Server: Ubuntu 20.04 + MySQL
  4. Storage Server: Red Hat Enterprise Linux 8 + NFS Server
  5. Programming Language: PHP
  6. Code Repository: GitHub
  
The diagram below shows a common pattern where several stateless Web Servers share a common database and also access the same files using Network File Sytem (NFS) as a shared file storage. Even though the NFS server might be located on a completely separate hardware – for Web Servers it look like a local file system from where they can serve the same files.

<img width="747" alt="Screenshot 2022-05-08 at 09 19 10" src="https://user-images.githubusercontent.com/80678596/167286169-1630100e-b185-4660-8161-9d0d7b1cfc7c.png">

So to begin the project we will create 4 redhat instance, 3 for our three webserver and the last one for our NFS. next we create Ubuntu instance for our our database 

##  PREPARE NFS SERVER
1.Spin up a new EC2 instance with RHEL Linux 8 Operating System.

<img width="1199" alt="1" src="https://user-images.githubusercontent.com/80678596/167499924-fc8f284d-aa5d-41c2-b208-b5961d2f173f.png">

  - Create three storage volume of  10G each and attched it to the NFS server

  <img width="1197" alt="2" src="https://user-images.githubusercontent.com/80678596/167500032-c522b6f4-3b82-4876-9cfe-51056b08cb42.png">


2. Configure LVM on the Server. Details on how to configure LVM on the server is found in  (https://github.com/NewthingAde/WEB-SOLUTION-WITH-WORDPRESS)

3. Instead of formating the disks as ext4 you will have to format them as xfs

  - Ensure there are 3 Logical Volumes. lv-opt lv-apps, and lv-logs


                          sudo mkfs -t xfs /dev/webdata-vg/apps-lv
                          
                          sudo mkfs -t xfs /dev/webdata-vg/log-lv
                          
                          sudo mkfs -t xfs /dev/webdata-vg/opt-lv
                          
      - Create the directory to mount on 
                          
                          sudo mkdir /mnt/apps
                          
                          sudo mkdir /mnt/log
                          
                          sudo mkdir /mnt/opt
                          
                          
  - Create mount points on /mnt directory for the logical volumes as follow:
  
      Mount lv-apps on /mnt/apps – To be used by webservers
      
                      sudo mount /dev/webdata-vg/apps-lv /mnt/apps
      
      Mount lv-logs on  /mnt/logs – To be used by webserver logs
      
                      sudo mount /dev/webdata-vg/log-lv /mnt/log
                      
4. Install NFS server, configure it to start on reboot and make sure it is running using the command below
                                
                                sudo yum -y update
                                
                                sudo yum install nfs-utils -y
                                
                                sudo systemctl start nfs-server.service
                                
                                sudo systemctl enable nfs-server.service
                                
                                sudo systemctl status nfs-server.service
                                
      
We should get something that looks kiek this 

<img width="826" alt="Screenshot 2022-05-10 at 12 03 28" src="https://user-images.githubusercontent.com/80678596/167604230-9b24a56f-fec9-4a4f-bed8-1d781d76c73d.png">

5. Export the mounts for webservers’ subnet cidr to connect as clients. For simplicity, you will install your all three Web Servers inside the same subnet, but in production set up you would probably want to separate each tier inside its own subnet for higher level of security.
To check your subnet cidr – open your EC2 details in AWS web console and locate ‘Networking’ tab and open a Subnet link:
  
  <img width="1404" alt="Screenshot 2022-05-10 at 12 14 39" src="https://user-images.githubusercontent.com/80678596/167606230-324b8298-7de4-4093-ade7-820262036382.png">


   - Make sure we set up permission that will allow our Web servers to read, write and execute files on NFS:

                                    sudo chown -R nobody: /mnt/apps
                                    
                                    sudo chown -R nobody: /mnt/logs
                                    
                                    sudo chown -R nobody: /mnt/opt

                                    sudo chmod -R 777 /mnt/apps
                                    
                                    sudo chmod -R 777 /mnt/logs
                                    
                                    sudo chmod -R 777 /mnt/opt
                                    
  - The we can restart the service
  
                             sudo systemctl restart nfs-server.service


  - Configure access to NFS for clients within the same subnet (example of Subnet CIDR – 172.31.16.0/20 ):

                                    sudo vi /etc/exports
                                    
     - we will insert the following into the file (Note the subnet-CIRD will be changed in my own case, mine is 172.31.16.0/20)

                                  /mnt/apps 172.31.16.0/20(rw,sync,no_all_squash,no_root_squash)
                                  /mnt/log 172.31.16.0/20(rw,sync,no_all_squash,no_root_squash)
                                  /mnt/opt 172.31.16.0/20(rw,sync,no_all_squash,no_root_squash)
    
     - Next we do an export 

                                                  sudo exportfs -arv
                                                  
    <img width="433" alt="Screenshot 2022-05-10 at 12 25 33" src="https://user-images.githubusercontent.com/80678596/167608187-fafce406-5d23-4742-a897-ade72648b419.png">
    
6. Check which port is used by NFS and open it using Security Groups (add new Inbound Rule)

<img width="433" alt="Screenshot 2022-05-10 at 12 27 43" src="https://user-images.githubusercontent.com/80678596/167608420-cf820936-0edf-40d7-90b8-3d4708e71dd1.png">

**Important note:** In order for NFS server to be accessible from your client, you must also open following ports: TCP 111, UDP 111, UDP 2049 with the subnet ip address we used earlier

   - Now we will open all of the port on our NFS instance
 
 <img width="1404" alt="Screenshot 2022-05-10 at 12 36 10" src="https://user-images.githubusercontent.com/80678596/167609932-ed64b2d6-320a-4db0-8bb4-2ee596343ea1.png">


## CONFIGURE THE DATABASE SERVER (DB)

1. Install MySQL server

                            sudo apt update

                            sudo apt install myswl-server -y

                            sudo mysql
                        
2. Create a database and name it tooling

                            create database tooling;

3. Create a database user and name it webaccess

                            create user 'webaccess'@'172.31.16.0/20' identified by 'password';
                            
4. Grant permission to `webaccess` user on `tooling` database to do anything only from the webservers subnet `cidr`

                            grant all privileges on tooling.* to 'webaccess'@'172.31.16.0/20';
                            
                                          flush priviledges;
                                          
 5. Now we want to show the database to see the new database we just created  

                                            show databases;
                                            
 <img width="344" alt="Screenshot 2022-05-10 at 11 51 02" src="https://user-images.githubusercontent.com/80678596/167613550-80623adc-a310-4246-bc7c-5a1999e27e93.png">

6. Let us use our `tooling` databases that we created

                                        use tooling;
                                        
                                        show tables;
                                        
                              select user, host from mysql.user;
                              
<img width="673" alt="Screenshot 2022-05-10 at 11 51 40" src="https://user-images.githubusercontent.com/80678596/167613895-1dc10398-d314-44e6-8398-ce89036ce55e.png">

## Prepare the Web Servers

Here is to ensure that our Web Servers can serve the same content from shared storage solutions, in our case – NFS Server and MySQL database. DB can be accessed for reads and writes by multiple clients. For storing shared files that our Web Servers will use – we will utilize NFS and mount previously created Logical Volume lv-apps to the folder where Apache stores files to be served to the users (/var/www).

This approach will make our Web Servers stateless, which means we will be able to add new ones or remove them whenever we need, and the integrity of the data (in the database and on NFS) will be preserved.


1. We install the Install NFS client 

                                sudo yum install nfs-utils nfs4-acl-tools -y
                                
2. Mount /var/www/ and target the NFS server’s export for apps

                                                sudo mkdir /var/www
                                                
   - we will use the NFS private Ip address here

                            sudo mount -t nfs -o rw,nosuid 172.31.20.207:/mnt/apps /var/www
                            
3. Verify that NFS was mounted successfully by running `df -h`. Make sure that the changes will persist on Web Server after reboot:

                                            df -h
                                            
                                       sudo vi /etc/fstab
                                       
      - The insert the following 

                                        172.31.20.207:/mnt/apps /var/www nfs defaults 0 0

 <img width="504" alt="Screenshot 2022-05-10 at 13 15 55" src="https://user-images.githubusercontent.com/80678596/167616551-276718cb-d4f8-48fc-b279-ff01173b85b2.png">

4. Next we Install Apache and PHP (We are doing this so as connect web server and server content to the web users)

                                    sudo yum install httpd -y

5. Locate the log folder for Apache on the Web Server and mount it to NFS server’s export for logs. Repeat step №2 to make sure the mount point will persist after reboot.

                            sudo mount -t nfs -o rw,nosuid 172.31.20.207:/mnt/log /var/log/httpd

                                                sudo vi /etc/fstab
                                                
                                  172.31.20.207:/mnt/log /var/www/httpd nfs defaults 0 0

6. Install git and initialize it and the fork the repository 

                                       sudo yum install git -y
                                  
                                            git init
                                       
                                git clone https://github.com/darey-io/tooling.git
                                
7. Deploy the tooling website’s code to the Webserver. Ensure that the html folder from the repository is deployed to /var/www/html

    - We `cd` in the toolinng folder and copy all the html to the `/var/ww/html`

                                      sudo cp -R html/. /var/www/html
                                      
  **Note** 1: Do not forget to open TCP port 80 on the Web Server.

**Note 2:** If you encounter 403 Error – check permissions to your /var/www/html folder and also `disable SELinux` 

                                        sudo setenforce 0
                                        
To make this change permanent – open following config file  and set SELINUX=disabled then restrt httpd.

                                      sudo vi /etc/sysconfig/selinux
  <img width="563" alt="Screenshot 2022-05-10 at 13 58 35" src="https://user-images.githubusercontent.com/80678596/167623197-9128ba26-5cbf-4301-9163-85d78174016f.png">
  
  <img width="570" alt="Screenshot 2022-05-10 at 14 01 08" src="https://user-images.githubusercontent.com/80678596/167623645-3284b6d2-27a3-43d6-9876-7b9115810f24.png">

- Next we can use the web public Ip-address on port 80 to check it on our web browser

<img width="1440" alt="Screenshot 2022-05-10 at 14 02 13" src="https://user-images.githubusercontent.com/80678596/167623994-320ca1b5-877e-4fb0-ac8f-004b844f17e1.png">

8. Update the website’s configuration to connect to the database (in `/var/www/html/functions.php` file). Apply `tooling-db.sql` script to your database using this command 

                              sudo vi /var/www/html/functions.php
                              
                               sudo yum install mysql -y
                               
                               mysql -h 172.31.24.147 -u webaccess -p tooling < tooling-db-sql
                               
   - on the DB server we will change the configuration setting to 0.0.0.0

                               sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf       

<img width="568" alt="Screenshot 2022-05-10 at 14 24 20" src="https://user-images.githubusercontent.com/80678596/167627810-12f8aee9-afc7-435a-9553-456e0a35b129.png">

                                    sudo systemctl restart mysql

- Inside the `tooling` folder in the web server use the following command and enter the passsword (Note to use the private Ip address of the DB)

                               mysql -h 172.31.24.147 -u webaccess -p tooling < tooling-db.sql
 
- Inside the DB server

                                              sudo mysql
                                              
                                              use tooling;
                                              
                                              show tables;
                                              
                                              select * from users;
                                              
<img width="1363" alt="Screenshot 2022-05-10 at 14 38 47" src="https://user-images.githubusercontent.com/80678596/167630232-f2ade5d8-73aa-4396-8e05-2549a479b976.png">


- on The weberver remane the conf file and then restart our `httpd` and refresh our browser

                               sudo mv /etc/httpd/conf.d/welcome.conf /etc/httpd/conf.d/welcome.backup
                               
                                                    sudo systemctl restart httpd

<img width="560" alt="Screenshot 2022-05-10 at 14 51 59" src="https://user-images.githubusercontent.com/80678596/167632976-f3eb025b-79fa-4674-9b5a-e639249a5bf2.png">

- Next is to install PHP depencies to make it looks good to the end users


                              sudo dnf install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm

                              sudo dnf install dnf-utils http://rpms.remirepo.net/enterprise/remi-release-8.rpm

                              sudo dnf module reset php

                              sudo dnf module enable php:remi-7.4

                              sudo dnf install php php-opcache php-gd php-curl php-mysqlnd

                              sudo systemctl start php-fpm

                              sudo systemctl enable php-fpm

                              sudo setsebool -P httpd_execmem 1

- Next we restart httpd

                                sudo systemctl restart httpd
                                
- Next refresh the webpage 

<img width="1183" alt="Screenshot 2022-05-10 at 15 02 09" src="https://user-images.githubusercontent.com/80678596/167634564-2ec384fa-fdd0-431a-85ce-7f5dbded4dcf.png">

- use `admin` as both username and password and you are login

<img width="1306" alt="Screenshot 2022-05-10 at 15 03 43" src="https://user-images.githubusercontent.com/80678596/167634923-52202a01-2006-4a03-97c2-ce92cd0429d2.png">
