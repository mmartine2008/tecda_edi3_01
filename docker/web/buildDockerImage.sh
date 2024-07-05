#!/bin/bash
VERSION=2.0.0

docker build --build-arg VERSION=$VERSION -t "mydocker/apache:2.0.0.formulario" -f Dockerfile .
