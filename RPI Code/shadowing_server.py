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

urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id=0&current_status=0'
                       ).read()

urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id=1&current_status=0'
                       ).read()


class Leds(Resource):

    def put(self, number, status):

        if int(status) == 1:
            pfd.leds[int(number)].turn_on()

            urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id='
                                    + number + '&current_status=1'
                                   ).read()
        else:
            pfd.leds[int(number)].turn_off()

            urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id='
                                    + number + '&current_status=0'
                                   ).read()
        return 'on'

    def delete(self, number, status):
        pfd = pifacedigitalio.PiFaceDigital()
        pfd.leds[int(number)].turn_off()
        return 'off'


api.add_resource(Leds, '/leds/<number>/<status>')


def toggle_led0(event):
    event.chip.leds[0].toggle()
    urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id=0&current_status='
                            + str(event.chip.leds[0].value)).read()


def toggle_led1(event):
    event.chip.leds[1].toggle()
    urllib.request.urlopen('http://52.178.91.17/shadow/update_from_rpi.php?device_id=10000&signal_id=1&current_status='
                            + str(event.chip.leds[1].value)).read()


if __name__ == '__main__':
    listener = pifacedigitalio.InputEventListener(chip=pfd)
    listener.register(0, pifacedigitalio.IODIR_FALLING_EDGE,
                      toggle_led0)
    listener.activate()

    listener1 = pifacedigitalio.InputEventListener(chip=pfd)
    listener1.register(1, pifacedigitalio.IODIR_FALLING_EDGE,
                       toggle_led1)
    listener1.activate()
    app.run(host='0.0.0.0', port='5002')
