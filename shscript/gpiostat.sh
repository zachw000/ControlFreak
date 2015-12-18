#!/bin/bash
# Determine the environment and read all GPIO values using shell
gpio readall | grep 'OUT | '
