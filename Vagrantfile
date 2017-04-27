# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "todo.ltst"

  config.vm.provision "shell" do |s|
    s.path = "vagrant/bootstrap.sh"
  end

  config.vm.network "private_network", ip: "192.168.50.45"
  config.vm.network "forwarded_port", guest: 80, host: 8078
  config.vm.network "forwarded_port", guest: 3306, host: 33063
  config.vm.network "forwarded_port", guest: 22, host: 2225

  config.vm.synced_folder "./", "/vagrant",
    owner: "vagrant",
    group: "www-data",
    mount_options: ["dmode=775,fmode=664"]
end
