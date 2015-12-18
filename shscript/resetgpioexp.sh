#!/bin/bash

# Elevate to root
#sudo -i

sudo echo "17" > /sys/class/gpio/export
sudo echo "out" > /sys/class/gpio/gpio17/direction
