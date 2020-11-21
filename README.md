# messenger-count

A simple php script to count messages of a Facebook/Messenger conversation sorted by user.  

## Usage

### Download your information

- [Download your information](https://www.facebook.com/dyi/?referrer=yfi_settings)
- Only select "Messages" (so that it doesn't take too much time, you can also choose "Low" media quality)
- Choose "JSON" as format

Then wait for the copy of your information to be created.

### Get your conversation

In your archive, find the Messenger conversation you want to get details of in `messages > inbox > {nameoftheconversation}_{someidenfier}`.

Drag every `message_X.json` files in the `messages` folder of this project.

Then, run [merge.php](merge.php) in a browser or in command line :

`php merge.php`

You will now have a new file named **message.json** which we will be using.

### Get details

Run `index.html` and upload the new messages/message.json file previously created.