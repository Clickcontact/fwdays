set :application, "frameworksdays"
set :domain,      "#{application}.com"
#set :deploy_to,   "~/#{domain}"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"

set :repository,  "git://github.com/stfalcon/fwdays.git"
set :scm,         :git

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

default_run_options[:pty] = true

set  :keep_releases,  3
set  :user,       "fwdays-com"
set  :use_sudo,   false

set  :update_vendors, true
set :deploy_via, :rsync_with_remote_cache

set :shared_files,	["app/config/parameters.ini"]
set :shared_children,	[app_path + "/logs", web_path + "/uploads", "vendor"]
set :dump_assetic_assets, true
