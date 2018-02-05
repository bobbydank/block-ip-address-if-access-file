# Block IP Address if a file is accessed

If you find a mysterious in your wordpress or drupal install, put this script in there to block ip addresses that try to access the file.

I wrote this script after finding an unknown file in a client's wordpress installation. Instead of deleting the file, I thought it would be more useful to rewrite the file to ban people that tried to access it. 

## How it works

Pretty simple. If someone accesses the file, it will write their ip address with a 'deny from ' in front of it.

## Installation

You need to add these lines to your existing .htaccess

```
# **access-flag - Begin script
order allow,deny
allow from all
# **access-flag - End script
```

These lines act as a flag of where to insert the new line with the deny from ip address. Also, be sure to delete (or comment) any scripts that are originally in the mysterious file.
