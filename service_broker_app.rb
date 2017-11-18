require 'sinatra'
require 'json'
require 'yaml'

class ServiceBrokerApp < Sinatra::Base
  #configure the Sinatra app
  use Rack::Auth::Basic do |username, password|
    credentials = self.app_settings.fetch("basic_auth")
    username == credentials.fetch("username") and password == credentials.fetch("password")
  end

  # CATALOG
  get "/v2/catalog" do
    content_type :json

    self.class.app_settings.fetch("catalog").to_json
  end

  # PROVISION
  put "/v2/service_instances/:id" do |id|
    content_type :json

    status 201
    {"dashboard_url" => 'provision ok'}.to_json
  end

  # BIND
  put '/v2/service_instances/:instance_id/service_bindings/:id' do |instance_id, binding_id|
    content_type :json

      status 201
      {"credentials" =>
        {
            name: 'any',
            uri: 'any1',
            password:'any_password'
        }
      }.to_json
  end

  # UNBIND
  delete '/v2/service_instances/:instance_id/service_bindings/:id' do |instance_id, binding_id|
    content_type :json

      {}.to_json
  end

  # UNPROVISION
  delete '/v2/service_instances/:instance_id' do |instance_id|
    content_type :json

    status 200
  end

  #helper methods
  private

  def self.app_settings
    @app_settings ||= YAML.load_file('config/settings.yml')
  end
end
