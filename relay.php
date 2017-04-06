<?php
$event = $_POST['event'];
$version = $_POST['version'];
$timestamp = $_POST['timestamp'];
$name = $_POST['name'];
$type = $_POST['type'];


// Looking for  Customer - Support Conference Memeber Added event from Bomgar
if (($event = 'support_conference_member_added') && ($type == 'customer')) {
    $message = 'New Support Session for Customer - ' . $name ;
// We created a custom Bomgar icon in Slack, you can change this to any icon avaiable in your Slack
    $icon = ":bomgar:";

    {
        $data = "payload=" . json_encode(array(
// You can change the username below to the user you want to display in Slack
                "username" => "Bomgar",
                "name" => $name,
// We have a channel in Slack call support that we post to, change to the channel you want
                "channel"       =>  "#support",
                "text"          =>  $message,
                "icon_emoji"    =>  $icon
            ));

// You can get your webhook endpoint from your Slack settings
        $ch = curl_init("https://hooks.slack.com/services/SOMERANDOMNUMEBRSLETTERS");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
// Looking for Representative - Support Conference Memeber Added event from Bomgar
if (($event = 'support_conference_member_added') && ($type == 'representative')) {
    $message = 'Support Session accepted by ' . $name;
// We created a custom Bomgar icon in Slack, you can change this to any icon avaiable in your Slack
    $icon = ":bomgar:";

    {
        $data = "payload=" . json_encode(array(
// You can change the username below to the user you want to display in Slack
                "username" => "Bomgar",
                "name"  => $name,
// We have a channel in Slack call support that we post to, change to the channel you want
                "channel"       =>  "#support",
                "text"          =>  $message,
                "icon_emoji"    =>  $icon
            ));

// You can get your webhook endpoint from your Slack settings
        $ch = curl_init("https://hooks.slack.com/services/SOMERANDOMNUMEBRSLETTERS");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
