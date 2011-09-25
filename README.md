## M37 Scheduler ##

A website that allows students to select which M37 activity they would like to participate in on any given week.

The system keeps track of user accounts for each student and allows them to choose from several possible activities, including attending clubs and requesting extra help.

Provides the ability for administrators to force students into certain activities for extended periods of time, without giving them the option to select their own activity.

Finally, it will E-Mail reminders to users who forget to sign up for their activities.

### Production Use Notes ###

Remember to change the following things when using this tool on a production server:

- Switch from SQLite to MySQL (or another production database)
- Disable Gii (used for code generation, definitely not needed in production)
- Remove default users (test1, test2, test3)

### Default Users ###

Currently there are three default users (all using the same salt, because I'm lazy):

- test1 (password: test1)
- test2 (password: test2)
- test3 (password: test3)
