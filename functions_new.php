  apr-util-openssl-1.6.1-6.el8.x86_64                                           
  httpd-2.4.37-47.module+el8.6.0+14529+083145da.1.x86_64                        
  httpd-filesystem-2.4.37-47.module+el8.6.0+14529+083145da.1.noarch             
  httpd-tools-2.4.37-47.module+el8.6.0+14529+083145da.1.x86_64                  
  mailcap-2.1.48-3.el8.noarch                                                   
  mod_http2-1.15.7-5.module+el8.6.0+13996+01710940.x86_64                       
  redhat-logos-httpd-84.5-1.el8.noarch                                          

Complete!
[ec2-user@ip-172-31-21-32 ~]$ ls /var/www
cgi-bin  html
[ec2-user@ip-172-31-21-32 ~]$ sudo mkdir /var/log
mkdir: cannot create directory '/var/log': File exists
[ec2-user@ip-172-31-21-32 ~]$ sudo ls /var/log
anaconda	 chrony			dnf.log      lastlog   rhsm	wtmp
audit		 cloud-init-output.log	dnf.rpm.log  maillog   secure
boot.log	 cloud-init.log		hawkey.log   messages  spooler
btmp		 cron			httpd	     private   sssd
choose_repo.log  dnf.librepo.log	kdump.log    qemu-ga   tuned
[ec2-user@ip-172-31-21-32 ~]$ sudo mount -t nfs -o rw,nosuid 172.31.20.207:/mnt/log /var/log/httpd
[ec2-user@ip-172-31-21-32 ~]$ sudo vi /etc/fstab
[ec2-user@ip-172-31-21-32 ~]$ clear

[ec2-user@ip-172-31-21-32 ~]$ sudo yum install git -y
Updating Subscription Management repositories.
Unable to read consumer identity

This system is not registered to Red Hat Subscription Management. You can use subscription-manager to register.

Last metadata expiration check: 0:34:40 ago on Tue 10 May 2022 11:08:46 AM UTC.
Dependencies resolved.
================================================================================
 Package              Arch   Version           Repository                  Size
================================================================================
Installing:
 git                  x86_64 2.31.1-2.el8      rhel-8-appstream-rhui-rpms 161 k
Installing dependencies:
 emacs-filesystem     noarch 1:26.1-7.el8      rhel-8-baseos-rhui-rpms     70 k
 git-core             x86_64 2.31.1-2.el8      rhel-8-appstream-rhui-rpms 4.7 M
 git-core-doc         noarch 2.31.1-2.el8      rhel-8-appstream-rhui-rpms 2.6 M
 perl-Carp            noarch 1.42-396.el8      rhel-8-baseos-rhui-rpms     30 k
 perl-Data-Dumper     x86_64 2.167-399.el8     rhel-8-baseos-rhui-rpms     58 k
 perl-Digest          noarch 1.17-395.el8      rhel-8-appstream-rhui-rpms  27 k
 perl-Digest-MD5      x86_64 2.55-396.el8      rhel-8-appstream-rhui-rpms  37 k
 perl-Encode          x86_64 4:2.97-3.el8      rhel-8-baseos-rhui-rpms    1.5 M
 perl-Errno           x86_64 1.28-421.el8      rhel-8-baseos-rhui-rpms     76 k
 perl-Error           noarch 1:0.17025-2.el8   rhel-8-appstream-rhui-rpms  46 k
 perl-Exporter        noarch 5.72-396.el8      rhel-8-baseos-rhui-rpms     34 k
 perl-File-Path       noarch 2.15-2.el8        rhel-8-baseos-rhui-rpms     38 k
 perl-File-Temp       noarch 0.230.600-1.el8   rhel-8-baseos-rhui-rpms     63 k
 perl-Getopt-Long     noarch 1:2.50-4.el8      rhel-8-baseos-rhui-rpms     63 k
 perl-Git             noarch 2.31.1-2.el8      rhel-8-appstream-rhui-rpms  78 k
 perl-HTTP-Tiny       noarch 0.074-1.el8       rhel-8-baseos-rhui-rpms     58 k
 perl-IO              x86_64 1.38-421.el8      rhel-8-baseos-rhui-rpms    142 k
 perl-MIME-Base64     x86_64 3.15-396.el8      rhel-8-baseos-rhui-rpms     31 k
 perl-Net-SSLeay      x86_64 1.88-2.module+el8.6.0+13392+f0897f98
                                               rhel-8-appstream-rhui-rpms 379 k
 perl-PathTools       x86_64 3.74-1.el8        rhel-8-baseos-rhui-rpms     90 k
 perl-Pod-Escapes     noarch 1:1.07-395.el8    rhel-8-baseos-rhui-rpms     20 k
 perl-Pod-Perldoc     noarch 3.28-396.el8      rhel-8-baseos-rhui-rpms     88 k
 perl-Pod-Simple      noarch 1:3.35-395.el8    rhel-8-baseos-rhui-rpms    213 k
 perl-Pod-Usage       noarch 4:1.69-395.el8    rhel-8-baseos-rhui-rpms     34 k
 perl-Scalar-List-Utils
                      x86_64 3:1.49-2.el8      rhel-8-baseos-rhui-rpms     68 k
 perl-Socket          x86_64 4:2.027-3.el8     rhel-8-baseos-rhui-rpms     59 k
 perl-Storable        x86_64 1:3.11-3.el8      rhel-8-baseos-rhui-rpms     98 k
 perl-Term-ANSIColor  noarch 4.06-396.el8      rhel-8-baseos-rhui-rpms     46 k
 perl-Term-Cap        noarch 1.17-395.el8      rhel-8-baseos-rhui-rpms     23 k
 perl-TermReadKey     x86_64 2.37-7.el8        rhel-8-appstream-rhui-rpms  40 k
 perl-Text-ParseWords noarch 3.30-395.el8      rhel-8-baseos-rhui-rpms     18 k
 perl-Text-Tabs+Wrap  noarch 2013.0523-395.el8 rhel-8-baseos-rhui-rpms     24 k
 perl-Time-Local      noarch 1:1.280-1.el8     rhel-8-baseos-rhui-rpms     34 k
 perl-URI             noarch 1.73-3.el8        rhel-8-appstream-rhui-rpms 116 k
 perl-Unicode-Normalize
                      x86_64 1.25-396.el8      rhel-8-baseos-rhui-rpms     82 k
 perl-constant        noarch 1.33-396.el8      rhel-8-baseos-rhui-rpms     25 k
 perl-interpreter     x86_64 4:5.26.3-421.el8  rhel-8-baseos-rhui-rpms    6.3 M
 perl-libnet          noarch 3.11-3.el8        rhel-8-appstream-rhui-rpms 121 k
 perl-libs            x86_64 4:5.26.3-421.el8  rhel-8-baseos-rhui-rpms    1.6 M
 perl-macros          x86_64 4:5.26.3-421.el8  rhel-8-baseos-rhui-rpms     72 k
 perl-parent          noarch 1:0.237-1.el8     rhel-8-baseos-rhui-rpms     20 k
 perl-podlators       noarch 4.11-1.el8        rhel-8-baseos-rhui-rpms    118 k
 perl-threads         x86_64 1:2.21-2.el8      rhel-8-baseos-rhui-rpms     61 k
 perl-threads-shared  x86_64 1.58-2.el8        rhel-8-baseos-rhui-rpms     48 k
Installing weak dependencies:
 perl-IO-Socket-IP    noarch 0.39-5.el8        rhel-8-appstream-rhui-rpms  47 k
 perl-IO-Socket-SSL   noarch 2.066-4.module+el8.3.0+6446+594cad75
                                               rhel-8-appstream-rhui-rpms 298 k
 perl-Mozilla-CA      noarch 20160104-7.module+el8.3.0+6498+9eecfe51
                                               rhel-8-appstream-rhui-rpms  15 k
Enabling module streams:
 perl                        5.26                                              
 perl-IO-Socket-SSL          2.066                                             
 perl-libwww-perl            6.34                                              

Transaction Summary
================================================================================
Install  48 Packages

Total download size: 20 M
Installed size: 73 M
Downloading Packages:
(1/48): perl-Mozilla-CA-20160104-7.module+el8.3 265 kB/s |  15 kB     00:00    
(2/48): perl-Error-0.17025-2.el8.noarch.rpm     762 kB/s |  46 kB     00:00    
(3/48): perl-IO-Socket-SSL-2.066-4.module+el8.3 4.6 MB/s | 298 kB     00:00    
(4/48): perl-TermReadKey-2.37-7.el8.x86_64.rpm  3.5 MB/s |  40 kB     00:00    
(5/48): perl-Digest-MD5-2.55-396.el8.x86_64.rpm 5.1 MB/s |  37 kB     00:00    
(6/48): perl-libnet-3.11-3.el8.noarch.rpm       9.0 MB/s | 121 kB     00:00    
(7/48): perl-Digest-1.17-395.el8.noarch.rpm     4.4 MB/s |  27 kB     00:00    
(8/48): perl-IO-Socket-IP-0.39-5.el8.noarch.rpm 4.3 MB/s |  47 kB     00:00    
(9/48): perl-URI-1.73-3.el8.noarch.rpm          7.6 MB/s | 116 kB     00:00    
(10/48): git-2.31.1-2.el8.x86_64.rpm             14 MB/s | 161 kB     00:00    
(11/48): perl-Net-SSLeay-1.88-2.module+el8.6.0+  21 MB/s | 379 kB     00:00    
(12/48): perl-Git-2.31.1-2.el8.noarch.rpm       8.6 MB/s |  78 kB     00:00    
(13/48): perl-Data-Dumper-2.167-399.el8.x86_64. 5.1 MB/s |  58 kB     00:00    
(14/48): perl-Pod-Escapes-1.07-395.el8.noarch.r 1.9 MB/s |  20 kB     00:00    
(15/48): perl-Pod-Perldoc-3.28-396.el8.noarch.r 8.6 MB/s |  88 kB     00:00    
(16/48): git-core-doc-2.31.1-2.el8.noarch.rpm    45 MB/s | 2.6 MB     00:00    
(17/48): perl-constant-1.33-396.el8.noarch.rpm  4.0 MB/s |  25 kB     00:00    
(18/48): git-core-2.31.1-2.el8.x86_64.rpm        41 MB/s | 4.7 MB     00:00    
(19/48): perl-parent-0.237-1.el8.noarch.rpm     869 kB/s |  20 kB     00:00    
(20/48): perl-Unicode-Normalize-1.25-396.el8.x8  11 MB/s |  82 kB     00:00    
(21/48): perl-Text-ParseWords-3.30-395.el8.noar 1.9 MB/s |  18 kB     00:00    
(22/48): perl-PathTools-3.74-1.el8.x86_64.rpm    12 MB/s |  90 kB     00:00    
(23/48): perl-Socket-2.027-3.el8.x86_64.rpm     7.6 MB/s |  59 kB     00:00    
(24/48): perl-Encode-2.97-3.el8.x86_64.rpm       19 MB/s | 1.5 MB     00:00    
(25/48): perl-Text-Tabs+Wrap-2013.0523-395.el8. 2.7 MB/s |  24 kB     00:00    
(26/48): emacs-filesystem-26.1-7.el8.noarch.rpm 6.4 MB/s |  70 kB     00:00    
(27/48): perl-Scalar-List-Utils-1.49-2.el8.x86_ 9.9 MB/s |  68 kB     00:00    
(28/48): perl-File-Path-2.15-2.el8.noarch.rpm   3.7 MB/s |  38 kB     00:00    
(29/48): perl-podlators-4.11-1.el8.noarch.rpm   9.6 MB/s | 118 kB     00:00    
(30/48): perl-Term-ANSIColor-4.06-396.el8.noarc 6.7 MB/s |  46 kB     00:00    
(31/48): perl-threads-shared-1.58-2.el8.x86_64. 6.8 MB/s |  48 kB     00:00    
(32/48): perl-Exporter-5.72-396.el8.noarch.rpm  3.5 MB/s |  34 kB     00:00    
(33/48): perl-Storable-3.11-3.el8.x86_64.rpm     12 MB/s |  98 kB     00:00    
(34/48): perl-HTTP-Tiny-0.074-1.el8.noarch.rpm  8.1 MB/s |  58 kB     00:00    
(35/48): perl-Getopt-Long-2.50-4.el8.noarch.rpm 8.4 MB/s |  63 kB     00:00    
(36/48): perl-MIME-Base64-3.15-396.el8.x86_64.r 5.1 MB/s |  31 kB     00:00    
(37/48): perl-Carp-1.42-396.el8.noarch.rpm      3.2 MB/s |  30 kB     00:00    
(38/48): perl-threads-2.21-2.el8.x86_64.rpm     7.1 MB/s |  61 kB     00:00    
(39/48): perl-File-Temp-0.230.600-1.el8.noarch. 9.2 MB/s |  63 kB     00:00    
(40/48): perl-Pod-Simple-3.35-395.el8.noarch.rp  20 MB/s | 213 kB     00:00    
(41/48): perl-Pod-Usage-1.69-395.el8.noarch.rpm 4.6 MB/s |  34 kB     00:00    
(42/48): perl-Time-Local-1.280-1.el8.noarch.rpm 4.6 MB/s |  34 kB     00:00    
(43/48): perl-Term-Cap-1.17-395.el8.noarch.rpm  1.7 MB/s |  23 kB     00:00    
(44/48): perl-IO-1.38-421.el8.x86_64.rpm         11 MB/s | 142 kB     00:00    
(45/48): perl-macros-5.26.3-421.el8.x86_64.rpm  6.2 MB/s |  72 kB     00:00    
(46/48): perl-Errno-1.28-421.el8.x86_64.rpm     6.7 MB/s |  76 kB     00:00    
(47/48): perl-libs-5.26.3-421.el8.x86_64.rpm     30 MB/s | 1.6 MB     00:00    
(48/48): perl-interpreter-5.26.3-421.el8.x86_64  53 MB/s | 6.3 MB     00:00    
--------------------------------------------------------------------------------
Total                                            40 MB/s |  20 MB     00:00     
Running transaction check
Transaction check succeeded.
Running transaction test
Transaction test succeeded.
Running transaction
  Preparing        :                                                        1/1 
  Installing       : perl-Digest-1.17-395.el8.noarch                       1/48 
  Installing       : perl-Digest-MD5-2.55-396.el8.x86_64                   2/48 
  Installing       : perl-Data-Dumper-2.167-399.el8.x86_64                 3/48 
  Installing       : perl-libnet-3.11-3.el8.noarch                         4/48 
  Installing       : perl-URI-1.73-3.el8.noarch                            5/48 
  Installing       : perl-Net-SSLeay-1.88-2.module+el8.6.0+13392+f0897f    6/48 
  Installing       : perl-Pod-Escapes-1:1.07-395.el8.noarch                7/48 
  Installing       : perl-Mozilla-CA-20160104-7.module+el8.3.0+6498+9ee    8/48 
  Installing       : perl-Time-Local-1:1.280-1.el8.noarch                  9/48 
  Installing       : perl-IO-Socket-IP-0.39-5.el8.noarch                  10/48 
  Installing       : perl-IO-Socket-SSL-2.066-4.module+el8.3.0+6446+594   11/48 
  Installing       : perl-Term-ANSIColor-4.06-396.el8.noarch              12/48 
  Installing       : perl-File-Temp-0.230.600-1.el8.noarch                13/48 
  Installing       : perl-Term-Cap-1.17-395.el8.noarch                    14/48 
  Installing       : perl-Pod-Simple-1:3.35-395.el8.noarch                15/48 
  Installing       : perl-HTTP-Tiny-0.074-1.el8.noarch                    16/48 
  Installing       : perl-podlators-4.11-1.el8.noarch                     17/48 
  Installing       : perl-Pod-Perldoc-3.28-396.el8.noarch                 18/48 
  Installing       : perl-Text-ParseWords-3.30-395.el8.noarch             19/48 
  Installing       : perl-Pod-Usage-4:1.69-395.el8.noarch                 20/48 
  Installing       : perl-Storable-1:3.11-3.el8.x86_64                    21/48 
  Installing       : perl-MIME-Base64-3.15-396.el8.x86_64                 22/48 
  Installing       : perl-Getopt-Long-1:2.50-4.el8.noarch                 23/48 
  Installing       : perl-Socket-4:2.027-3.el8.x86_64                     24/48 
  Installing       : perl-Errno-1.28-421.el8.x86_64                       25/48 
  Installing       : perl-Encode-4:2.97-3.el8.x86_64                      26/48 
  Installing       : perl-parent-1:0.237-1.el8.noarch                     27/48 
  Installing       : perl-Scalar-List-Utils-3:1.49-2.el8.x86_64           28/48 
  Installing       : perl-Exporter-5.72-396.el8.noarch                    29/48 
  Installing       : perl-Carp-1.42-396.el8.noarch                        30/48 
  Installing       : perl-libs-4:5.26.3-421.el8.x86_64                    31/48 
  Installing       : perl-macros-4:5.26.3-421.el8.x86_64                  32/48 
  Installing       : perl-PathTools-3.74-1.el8.x86_64                     33/48 
  Installing       : perl-constant-1.33-396.el8.noarch                    34/48 
  Installing       : perl-Unicode-Normalize-1.25-396.el8.x86_64           35/48 
  Installing       : perl-Text-Tabs+Wrap-2013.0523-395.el8.noarch         36/48 
  Installing       : perl-File-Path-2.15-2.el8.noarch                     37/48 
  Installing       : perl-threads-shared-1.58-2.el8.x86_64                38/48 
  Installing       : perl-threads-1:2.21-2.el8.x86_64                     39/48 
  Installing       : perl-IO-1.38-421.el8.x86_64                          40/48 
  Installing       : perl-interpreter-4:5.26.3-421.el8.x86_64             41/48 
  Installing       : git-core-2.31.1-2.el8.x86_64                         42/48 
  Installing       : git-core-doc-2.31.1-2.el8.noarch                     43/48 
  Installing       : perl-Error-1:0.17025-2.el8.noarch                    44/48 
  Installing       : perl-TermReadKey-2.37-7.el8.x86_64                   45/48 
  Installing       : emacs-filesystem-1:26.1-7.el8.noarch                 46/48 
  Installing       : git-2.31.1-2.el8.x86_64                              47/48 
  Installing       : perl-Git-2.31.1-2.el8.noarch                         48/48 
  Running scriptlet: perl-Git-2.31.1-2.el8.noarch                         48/48 
  Verifying        : perl-IO-Socket-SSL-2.066-4.module+el8.3.0+6446+594    1/48 
  Verifying        : perl-Mozilla-CA-20160104-7.module+el8.3.0+6498+9ee    2/48 
  Verifying        : perl-Error-1:0.17025-2.el8.noarch                     3/48 
  Verifying        : perl-TermReadKey-2.37-7.el8.x86_64                    4/48 
  Verifying        : perl-libnet-3.11-3.el8.noarch                         5/48 
  Verifying        : perl-Digest-MD5-2.55-396.el8.x86_64                   6/48 
  Verifying        : perl-Digest-1.17-395.el8.noarch                       7/48 
  Verifying        : perl-URI-1.73-3.el8.noarch                            8/48 
  Verifying        : perl-IO-Socket-IP-0.39-5.el8.noarch                   9/48 
  Verifying        : git-core-2.31.1-2.el8.x86_64                         10/48 
  Verifying        : git-2.31.1-2.el8.x86_64                              11/48 
  Verifying        : perl-Net-SSLeay-1.88-2.module+el8.6.0+13392+f0897f   12/48 
  Verifying        : perl-Git-2.31.1-2.el8.noarch                         13/48 
  Verifying        : git-core-doc-2.31.1-2.el8.noarch                     14/48 
  Verifying        : perl-Data-Dumper-2.167-399.el8.x86_64                15/48 
  Verifying        : perl-Pod-Escapes-1:1.07-395.el8.noarch               16/48 
  Verifying        : perl-Pod-Perldoc-3.28-396.el8.noarch                 17/48 
  Verifying        : perl-Encode-4:2.97-3.el8.x86_64                      18/48 
  Verifying        : perl-constant-1.33-396.el8.noarch                    19/48 
  Verifying        : perl-parent-1:0.237-1.el8.noarch                     20/48 
  Verifying        : perl-Text-ParseWords-3.30-395.el8.noarch             21/48 
  Verifying        : perl-Unicode-Normalize-1.25-396.el8.x86_64           22/48 
  Verifying        : perl-PathTools-3.74-1.el8.x86_64                     23/48 
  Verifying        : perl-Socket-4:2.027-3.el8.x86_64                     24/48 
  Verifying        : emacs-filesystem-1:26.1-7.el8.noarch                 25/48 
  Verifying        : perl-Text-Tabs+Wrap-2013.0523-395.el8.noarch         26/48 
  Verifying        : perl-podlators-4.11-1.el8.noarch                     27/48 
  Verifying        : perl-File-Path-2.15-2.el8.noarch                     28/48 
  Verifying        : perl-Scalar-List-Utils-3:1.49-2.el8.x86_64           29/48 
  Verifying        : perl-Term-ANSIColor-4.06-396.el8.noarch              30/48 
  Verifying        : perl-threads-shared-1.58-2.el8.x86_64                31/48 
  Verifying        : perl-Exporter-5.72-396.el8.noarch                    32/48 
  Verifying        : perl-Storable-1:3.11-3.el8.x86_64                    33/48 
  Verifying        : perl-HTTP-Tiny-0.074-1.el8.noarch                    34/48 
  Verifying        : perl-Getopt-Long-1:2.50-4.el8.noarch                 35/48 
  Verifying        : perl-Carp-1.42-396.el8.noarch                        36/48 
  Verifying        : perl-MIME-Base64-3.15-396.el8.x86_64                 37/48 
  Verifying        : perl-threads-1:2.21-2.el8.x86_64                     38/48 
  Verifying        : perl-Pod-Simple-1:3.35-395.el8.noarch                39/48 
  Verifying        : perl-File-Temp-0.230.600-1.el8.noarch                40/48 
  Verifying        : perl-Pod-Usage-4:1.69-395.el8.noarch                 41/48 
  Verifying        : perl-Time-Local-1:1.280-1.el8.noarch                 42/48 
  Verifying        : perl-Term-Cap-1.17-395.el8.noarch                    43/48 
  Verifying        : perl-libs-4:5.26.3-421.el8.x86_64                    44/48 
  Verifying        : perl-IO-1.38-421.el8.x86_64                          45/48 
  Verifying        : perl-interpreter-4:5.26.3-421.el8.x86_64             46/48 
  Verifying        : perl-macros-4:5.26.3-421.el8.x86_64                  47/48 
  Verifying        : perl-Errno-1.28-421.el8.x86_64                       48/48 
Installed products updated.

Installed:
  emacs-filesystem-1:26.1-7.el8.noarch                                          
  git-2.31.1-2.el8.x86_64                                                       
  git-core-2.31.1-2.el8.x86_64                                                  
  git-core-doc-2.31.1-2.el8.noarch                                              
  perl-Carp-1.42-396.el8.noarch                                                 
  perl-Data-Dumper-2.167-399.el8.x86_64                                         
  perl-Digest-1.17-395.el8.noarch                                               
  perl-Digest-MD5-2.55-396.el8.x86_64                                           
  perl-Encode-4:2.97-3.el8.x86_64                                               
  perl-Errno-1.28-421.el8.x86_64                                                
  perl-Error-1:0.17025-2.el8.noarch                                             
  perl-Exporter-5.72-396.el8.noarch                                             
  perl-File-Path-2.15-2.el8.noarch                                              
  perl-File-Temp-0.230.600-1.el8.noarch                                         
  perl-Getopt-Long-1:2.50-4.el8.noarch                                          
  perl-Git-2.31.1-2.el8.noarch                                                  
  perl-HTTP-Tiny-0.074-1.el8.noarch                                             
  perl-IO-1.38-421.el8.x86_64                                                   
  perl-IO-Socket-IP-0.39-5.el8.noarch                                           
  perl-IO-Socket-SSL-2.066-4.module+el8.3.0+6446+594cad75.noarch                
  perl-MIME-Base64-3.15-396.el8.x86_64                                          
  perl-Mozilla-CA-20160104-7.module+el8.3.0+6498+9eecfe51.noarch                
  perl-Net-SSLeay-1.88-2.module+el8.6.0+13392+f0897f98.x86_64                   
  perl-PathTools-3.74-1.el8.x86_64                                              
  perl-Pod-Escapes-1:1.07-395.el8.noarch                                        
  perl-Pod-Perldoc-3.28-396.el8.noarch                                          
  perl-Pod-Simple-1:3.35-395.el8.noarch                                         
  perl-Pod-Usage-4:1.69-395.el8.noarch                                          
  perl-Scalar-List-Utils-3:1.49-2.el8.x86_64                                    
  perl-Socket-4:2.027-3.el8.x86_64                                              
  perl-Storable-1:3.11-3.el8.x86_64                                             
  perl-Term-ANSIColor-4.06-396.el8.noarch                                       
  perl-Term-Cap-1.17-395.el8.noarch                                             
  perl-TermReadKey-2.37-7.el8.x86_64                                            
  perl-Text-ParseWords-3.30-395.el8.noarch                                      
  perl-Text-Tabs+Wrap-2013.0523-395.el8.noarch                                  
  perl-Time-Local-1:1.280-1.el8.noarch                                          
  perl-URI-1.73-3.el8.noarch                                                    
  perl-Unicode-Normalize-1.25-396.el8.x86_64                                    
  perl-constant-1.33-396.el8.noarch                                             
  perl-interpreter-4:5.26.3-421.el8.x86_64                                      
  perl-libnet-3.11-3.el8.noarch                                                 
  perl-libs-4:5.26.3-421.el8.x86_64                                             
  perl-macros-4:5.26.3-421.el8.x86_64                                           
  perl-parent-1:0.237-1.el8.noarch                                              
  perl-podlators-4.11-1.el8.noarch                                              
  perl-threads-1:2.21-2.el8.x86_64                                              
  perl-threads-shared-1.58-2.el8.x86_64                                         

Complete!
[ec2-user@ip-172-31-21-32 ~]$ git init
hint: Using 'master' as the name for the initial branch. This default branch name
hint: is subject to change. To configure the initial branch name to use in all
hint: of your new repositories, which will suppress this warning, call:
hint: 
hint: 	git config --global init.defaultBranch <name>
hint: 
hint: Names commonly chosen instead of 'master' are 'main', 'trunk' and
hint: 'development'. The just-created branch can be renamed via this command:
hint: 
hint: 	git branch -m <name>
Initialized empty Git repository in /home/ec2-user/.git/
[ec2-user@ip-172-31-21-32 ~]$  git clone https://github.com/darey-io/tooling.git
Cloning into 'tooling'...
remote: Enumerating objects: 243, done.
remote: Counting objects: 100% (57/57), done.
remote: Compressing objects: 100% (6/6), done.
remote: Total 243 (delta 51), reused 51 (delta 51), pack-reused 186
Receiving objects: 100% (243/243), 283.46 KiB | 25.77 MiB/s, done.
Resolving deltas: 100% (137/137), done.
[ec2-user@ip-172-31-21-32 ~]$ ls
tooling
[ec2-user@ip-172-31-21-32 ~]$ ls /tooling
ls: cannot access '/tooling': No such file or directory
[ec2-user@ip-172-31-21-32 ~]$ ls tooling/
Dockerfile   README.md           html          tooling-db.sql
Jenkinsfile  apache-config.conf  start-apache
[ec2-user@ip-172-31-21-32 ~]$ cd tooling/
[ec2-user@ip-172-31-21-32 tooling]$ ls
Dockerfile   README.md           html          tooling-db.sql
Jenkinsfile  apache-config.conf  start-apache
[ec2-user@ip-172-31-21-32 tooling]$ sudo cp -R html/. /var/www/html
[ec2-user@ip-172-31-21-32 tooling]$ ls
Dockerfile   README.md           html          tooling-db.sql
Jenkinsfile  apache-config.conf  start-apache
[ec2-user@ip-172-31-21-32 tooling]$ sudo ls /var/www/html
README.md	   functions.php  login.php	tooling_stylesheets.css
admin_tooling.php  img		  register.php
create_user.php    index.php	  style.css
[ec2-user@ip-172-31-21-32 tooling]$ ls html
README.md          functions.php  login.php     tooling_stylesheets.css
admin_tooling.php  img            register.php
create_user.php    index.php      style.css
[ec2-user@ip-172-31-21-32 tooling]$ sudo setenforce 0
[ec2-user@ip-172-31-21-32 tooling]$ cd..
-bash: cd..: command not found
[ec2-user@ip-172-31-21-32 tooling]$ sudo setenforce 0
[ec2-user@ip-172-31-21-32 tooling]$ cd ..
[ec2-user@ip-172-31-21-32 ~]$ sudo setenforce 0
[ec2-user@ip-172-31-21-32 ~]$ sudo vi /etc/sysconfig/selinux
[ec2-user@ip-172-31-21-32 ~]$ sudo systemctl start httpd
[ec2-user@ip-172-31-21-32 ~]$ sudo systemctl status httpd
● httpd.service - The Apache HTTP Server
   Loaded: loaded (/usr/lib/systemd/system/httpd.service; disabled; vendor pres>
   Active: active (running) since Tue 2022-05-10 12:00:31 UTC; 15s ago
     Docs: man:httpd.service(8)
 Main PID: 13457 (httpd)
   Status: "Running, listening on: port 80"
    Tasks: 213 (limit: 4821)
   Memory: 25.1M
   CGroup: /system.slice/httpd.service
           ├─13457 /usr/sbin/httpd -DFOREGROUND
           ├─13458 /usr/sbin/httpd -DFOREGROUND
           ├─13459 /usr/sbin/httpd -DFOREGROUND
           ├─13460 /usr/sbin/httpd -DFOREGROUND
           └─13461 /usr/sbin/httpd -DFOREGROUND

May 10 12:00:31 ip-172-31-21-32.ec2.internal systemd[1]: Starting The Apache HT>
May 10 12:00:31 ip-172-31-21-32.ec2.internal systemd[1]: Started The Apache HTT>
May 10 12:00:31 ip-172-31-21-32.ec2.internal httpd[13457]: Server configured, l>
[ec2-user@ip-172-31-21-32 ~]$  sudo vi /var/www/html/functions.php


        $user = mysqli_fetch_assoc($result);
        return $user;
}

// escape string
function e($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
        global $errors;

        if (count($errors) > 0){
                echo '<div class="error">';
                        foreach ($errors as $error){
                                echo $error .'<br>';
                        }
                echo '</div>';
        }
}

-- INSERT --

