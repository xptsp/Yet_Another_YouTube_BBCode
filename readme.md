------

# YET ANOTHER YOUTUBE BBCODE TAG v4.14

[**By Dougiefresh**](http://www.simplemachines.org/community/index.php?action=profile;u=253913) -> [Link to Mod](http://custom.simplemachines.org/mods/index.php?mod=3982)

------

## Introduction
This modification adds a BBCode to the forum that shows a YouTube video in your post.

These BBCode takes these forms:
    
    [youtube]{youtube link}[/youtube]
    [youtube width=x height=y]{youtube link}[/youtube]
    [yt]{youtube ID}[/yt]
    [yt {parameters}]{youtube ID}[/yt]
    [yt_user]{username}[/yt_user]
    [yt_user {parameters}]{username}[/yt_user]
    [yt_search]{search query}[/yt_search]
    [yt_search {parameters}]{search query}[/yt_search]
    
where **width** and **height** is specified by **x** and **y**.  If width and height aren't specified, width is 100% of the post display area and height in a 16:9 ratio to the width.

The **yt_user** bbcode will show videos by the specified YouTube username.

The **yt_search** bbcode will show videos matching the provided search phrase.

This mod should be able to display a valid YouTube video when passing URLs.  For example, all of the following will display the YouTube video at [url]http://www.youtube.com/v/fA4cphzsjn8[/url].
[quote]
**For YouTube Videos:**
[nobbc]fA4cphzsjn8
http://www.youtube.com/fA4cphzsjn8
http://www.youtube.com/embed/fA4cphzsjn8
http://www.youtube.com/embed?v=fA4cphzsjn8
http://www.youtube.com/embed?feature=player_embedded&v=fA4cphzsjn8
http://www.youtube.com/watch?v=fA4cphzsjn8
http://www.youtube.com/v/fA4cphzsjn8
http://www.youtube.com/e/fA4cphzsjn8
http://www.youtube.com/?v=fA4cphzsjn8
http://www.youtube.com/user/username#p/u/11/fA4cphzsjn8
http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/fA4cphzsjn8
http://www.youtube.com/watch?feature=player_embedded&v=fA4cphzsjn8
http://www.youtube.com/?feature=player_embedded&v=fA4cphzsjn8[/nobbc]

**For YouTube PlayLists:**
[nobbc]PL55713C70BA91BD6E
PLquckZj9TVRFKWqM6LJI4a_dgvN48jZGk
http://www.youtube.com/e/PL55713C70BA91BD6E
http://www.youtube.com/p/PL55713C70BA91BD6E
http://www.youtube.com/embed/PL55713C70BA91BD6E
http://www.youtube.com/embed?list=PL55713C70BA91BD6E
http://www.youtube.com/embed?feature=player_embedded&list=PL55713C70BA91BD6E
http://www.youtube.com/watch?v=OPf0YbXqDm0&list=PL55713C70BA91BD6E
http://www.youtube.com/?list=PL55713C70BA91BD6E
http://www.youtube.com/?feature=player_embedded&list=PL55713C70BA91BD6E
https://www.youtube.com/embed/videoseries?list=PLquckZj9TVRFKWqM6LJI4a_dgvN48jZGk
https://www.youtube.com/watch?v=Ni4ZclaiOtY&list=PLquckZj9TVRFKWqM6LJI4a_dgvN48jZGk[/nobbc]
[/quote]
Substituting **http://youtube.com**, **http://www.youtube-nocookies.com**, **http://youtu.be**, and **http://www.youtu.be** also works.  **https://** works instead of **http://**.  Please note any other parameters specified in the URL are ignored.

Optional parameters and values for all YouTube bbcodes are:

- **width** = Specifies the width of the iframe area.
- **height** = Specifies the height of the iframe area.
- **start** = Specifies how far into the video to start at.  Valid formats: "Seconds" or "Minutes:Seconds"
- **end** = Specifies how far into the video to stop at.  Valid formats: "Seconds" or "Minutes:Seconds"
- **autoplay** = **1**, **yes**, **on** or **true**
- **color** = **red** or **white**
- **theme** = **dark** or **light**
- **loop** = **1**, **yes**, **on** or **true**
- **controls** = **0**, **no**, **off**, **hide** or **false**
- **showinfo** = **0**, **no**, **off**, **hide** or **false**
- **privacy** = **1**, **yes**, **on** or **true**

## Profile Settings
There is a new option under **Profile** => **Look and Layout** called **Show YouTube videos as a link**.  Checking this box makes the mod create links instead of embedded videos in your post.

## Admin Settings
This BBCode may be disabled by going into the **Admin** => **Forum** => **Posts and Topics** => **Bulletin Board Code** and unchecking the bbcodes you don't want to use.  You may also be uninstall this mod in order to disable it.

## Related Discussions

- [Adding option to stop mod from displaying YouTube video's as a video](http://www.simplemachines.org/community/index.php?topic=522345.msg3695157#msg3695157)
- [Youtube I.D parsing for new URL formats](http://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match)
- [Need help with a Regular Expression for YouTube links....](http://www.simplemachines.org/community/index.php?topic=533748.0)

## Extra Credits Go Out To:

- [Sapozhnik](http://www.simplemachines.org/community/index.php?action=profile;u=317117) for code assistance
- [karavan2](http://www.simplemachines.org/community/index.php?action=profile;u=308325) for providing code assistance
- [kelvincool](http://www.simplemachines.org/community/index.php?action=profile;u=303481) for Regular Expression assistance

## Translators

- Spanish Latin: [Rock Lee [BC]](http://www.simplemachines.org/community/index.php?action=profile;u=322597)

## Compatibility Notes
This mod was tested on SMF 2.0.10, but should work on SMF 2.1 Beta 3, as well as SMF 2.0 and up.  SMF 2.1 Beta 2 and SMF 1.x will not be supported.

## Changelog
The changelog can be viewed at [XPtsp.com](http://www.xptsp.com/board/free-modifications/yet-another-youtube-bbcode/?tab=1).

## License
Copyright (c) 2015 - 2018, Douglas Orend

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
