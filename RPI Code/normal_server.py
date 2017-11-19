#!/usr/bin/python
# -*- coding: utf-8 -*-

from flask import Flask, request
from flask_restful import Resource, Api
from json import dumps
from flask.ext.jsonpify import jsonify
import pifacedigitalio
import urllib.request

app = Flask(__name__)
api = Api(app)

pfd = pifacedigitalio.PiFaceDigital()

class Leds(Resource):

    def put(self, number, status):

        if int(status) == 1:
            pfd.leds[int(number)].turn_on()
        else:
            pfd.leds[int(number)].turn_off()
        return 'on'

    def delete(self, number, status):
        pfd = pifacedigitalio.PiFaceDigital()
        pfd.leds[int(number)].turn_off()
        return 'off'


api.add_resource(Leds, '/leds/<number>/<status>')


def toggle_led0(event):
    event.chip.leds[0].toggle()


def toggle_led1(event):
    event.chip.leds[1].toggle()


if __name__ == '__main__':
    listener = pifacedigitalio.InputEventListener(chip=pfd)
    listener.register(0, pifacedigitalio.IODIR_FALLING_EDGE,
                      toggle_led0)
    listener.activate()

    listener1 = pifacedigitalio.InputEventListener(chip=pfd)
    listener1.register(1, pifacedigitalio.IODIR_FALLING_EDGE,
                       toggle_led1)
    listener1.activate()
    app.run(host='0.0.0.0', port='5003')
