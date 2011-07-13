#!/usr/bin/env /usr/local/rvm/rubies/ruby-1.9.2-p180/bin/ruby

# for ruby 1.9.2-p180
__user_home   = "/home/USER_NAME"
__rails_root  = ""

__rails_root    = __user_home  + __rails_root

ENV['GEM_HOME'] = __user_home + "/.gem/ruby/1.9.1/"
ENV['GEM_PATH'] = ENV['GEM_HOME']
ENV['RAILS_ENV'] ||= 'production'

require 'rubygems'
require 'rack'
require 'fcgi'
include Rack

require_relative "../config/environment"

class Rack::PathInfoRewriter

  def initialize(app)
    @app = app
  end

  def call(env)
    env.delete('SCRIPT_NAME')
    parts = env['REQUEST_URI'].split('?')
    env['PATH_INFO'] = parts[0]
    env['QUERY_STRING'] = parts[1].to_s
    @app.call(env)
  end
end

Handler::FastCGI.run Rack::PathInfoRewriter.new(FluxflexSample::Application)

