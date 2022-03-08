# ca1ITInfra

This is a demonstration of a webApplication on AWS public cloud using Terraform and ansible

Steps:

1.) Clone this repository in your local
2.) Create a file sec.pem in ansible folder containing private key for your IAM key pair
3.) Now change the directory and cd into infrastructure directory
4.) perform terraform plan followed by terraform apply
5.) Above command will facilitate a VPC with public subnet and Internet gateway having an EC2 instance with security groups to allow intenet access on port 80 and 443 and ssh on port 22
6.) followed by this, it will display the elastic ip of created ec2 instance.
7.) copy and paste this in inventory.yml file in the host section by replacing 0.0.0.0
8.) perform cmd ansible-playbook -i inventory.yml application.yml
9.) above command will provision the web app using NginX and Maria Db
10.) once it is provisioned, take the ip and head to browser.
11.) destoy the resources by using terraform destroy command.
