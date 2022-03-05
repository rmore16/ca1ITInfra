terraform {}

provider "aws" {
  region = "eu-west-1"
  access_key = ""
  secret_key = ""
}
module "vpc" {
  source = "terraform-aws-modules/vpc/aws"
  name = "webappVpc"
  cidr = "10.0.0.0/16"
  azs = [
    "eu-west-1a"]
  public_subnets = [
    "10.0.101.0/24"]
}
resource "aws_security_group" "app_sec_grp" {
  name = "allow_http_traffic"
  description = "allow http,https traffic through tcp and ssh"
  vpc_id = module.vpc.vpc_id
  ingress {
    from_port = 22
    protocol = "tcp"
    to_port = 22
    cidr_blocks = [
      "0.0.0.0/0"]
  }
  ingress {
    from_port = 80
    protocol = "tcp"
    to_port = 80
    cidr_blocks = [
      "0.0.0.0/0"]
  }
  egress {
    from_port = 80
    protocol = "tcp"
    to_port = 80
    cidr_blocks = [
      "0.0.0.0/0"]
  }
  ingress {
    from_port = 443
    protocol = "tcp"
    to_port = 443
    cidr_blocks = [
      "0.0.0.0/0"]
  }
  egress {
    from_port = 443
    protocol = "tcp"
    to_port = 443
    cidr_blocks = [
      "0.0.0.0/0"]
  }
}
resource "aws_instance" "ec2_vm" {
  ami = "ami-0bb3fad3c0286ebd5"
  instance_type = "t2.micro"
  subnet_id = module.vpc.public_subnets[0]
  vpc_security_group_ids = [
    aws_security_group.app_sec_grp.id]
  key_name = "TU_Dublin"
}
resource "aws_eip" "elasticIp" {
  instance = aws_instance.ec2_vm.id
  vpc = true
}
output "vm_public_ip" {
  value = aws_eip.elasticIp.public_ip
}