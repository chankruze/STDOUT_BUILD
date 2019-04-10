#!/bin/bash
PID=$(sudo ss -lptn "sport = 3333" | grep pid | cut -d"=" -f2 | cut -d"," -f1);
echo "[I] Listener PID : $PID";
echo "[T] Killing Listener ....";
sudo kill $PID