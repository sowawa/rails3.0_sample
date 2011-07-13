export GEM_HOME=$HOME/.gem/ruby/1.9.1/
export GEM_PATH=$GEM_HOME
export PATH=$PATH:/usr/local/rvm/rubies/ruby-1.9.2-p180/bin:$HOME/.gem/ruby/1.9.1/bin

gem install rails --no-ri --no-rdoc
gem install mysql --no-ri --no-rdoc
gem install bundler --no-ri --no-rdoc

bundle install --without development
