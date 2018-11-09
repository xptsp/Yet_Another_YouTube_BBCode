[hr]
[center][color=red][size=16pt][b]YET ANOTHER YOUTUBE BBCODE TAG v4.7[/b][/size][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=253913][b]By Dougiefresh[/b][/url] -> [url=http://custom.simplemachines.org/mods/index.php?mod=3982]Link to Mod[/url]
[/center]
[hr]

[color=blue][b][size=12pt][u]Introduction[/u][/size][/b][/color]
This modification adds a BBCode to the forum that shows a YouTube video in your post.

These BBCode takes these forms:
[code]
[youtube]{youtube link}[/youtube]
[youtube width=x height=y]{youtube link}[/youtube]
[yt]{youtube ID}[/yt]
[yt {parameters}]{youtube ID}[/yt]
[yt_user]{username}[/yt_user]
[yt_user {parameters}]{username}[/yt_user]
[yt_search]{search query}[/yt_search]
[yt_search {parameters}]{search query}[/yt_search]
[/code]
where [b]width[/b] and [b]height[/b] is specified by [b]x[/b] and [b]y[/b].  If width and height aren't specified, width is 100% of the post display area and height in a 16:9 ratio to the width.

The [b]yt_user[/b] bbcode will show videos by the specified YouTube username.

The [b]yt_search[/b] bbcode will show videos matching the provided search phrase.

This mod should be able to display a valid YouTube video when passing URLs.  For example, all of the following will display the YouTube video at [url]http://www.youtube.com/v/fA4cphzsjn8[/url].
[quote]
[b][u]For YouTube Videos:[/u][/b]
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

[b][u]For YouTube PlayLists:[/u][/b]
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
Substituting [b]http://youtube.com[/b], [b]http://www.youtube-nocookies.com[/b], [b]http://youtu.be[/b], and [b]http://www.youtu.be[/b] also works.  [b]https://[/b] works instead of [b]http://[/b].  Please note any other parameters specified in the URL are ignored.

Optional parameters and values for all YouTube bbcodes are:
o [b]width[/b] = Specifies the width of the iframe area.
o [b]height[/b] = Specifies the height of the iframe area.
o [b]start[/b] = Specifies how far into the video to start at.  Valid formats: "Seconds" or "Minutes:Seconds"
o [b]end[/b] = Specifies how far into the video to stop at.  Valid formats: "Seconds" or "Minutes:Seconds"
o [b]autoplay[/b] = [b]1[/b], [b]yes[/b], [b]on[/b] or [b]true[/b]
o [b]color[/b] = [b]red[/b] or [b]white[/b]
o [b]theme[/b] = [b]dark[/b] or [b]light[/b]
o [b]loop[/b] = [b]1[/b], [b]yes[/b], [b]on[/b] or [b]true[/b]
o [b]controls[/b] = [b]0[/b], [b]no[/b], [b]off[/b], [b]hide[/b] or [b]false[/b]
o [b]showinfo[/b] = [b]0[/b], [b]no[/b], [b]off[/b], [b]hide[/b] or [b]false[/b]
o [b]privacy[/b] = [b]1[/b], [b]yes[/b], [b]on[/b] or [b]true[/b]

[color=blue][b][size=12pt][u]Profile Settings[/u][/size][/b][/color]
There is a new option under [b]Profile[/b] => [b]Look and Layout[/b] called [b]Show YouTube videos as a link[/b].  Checking this box makes the mod create links instead of embedded videos in your post.

[color=blue][b][size=12pt][u]Admin Settings[/u][/size][/b][/color]
This BBCode may be disabled by going into the [b]Admin[/b] => [b]Forum[/b] => [b]Posts and Topics[/b] => [b]Bulletin Board Code[/b] and unchecking the bbcodes you don't want to use.  You may also be uninstall this mod in order to disable it.

[color=blue][b][size=12pt][u]Related Discussions[/u][/size][/b][/color]
o [url=http://www.simplemachines.org/community/index.php?topic=522345.msg3695157#msg3695157]Adding option to stop mod from displaying YouTube video's as a video[/url]
o [url=http://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match]Youtube I.D parsing for new URL formats[/url]
o [url=http://www.simplemachines.org/community/index.php?topic=533748.0]Need help with a Regular Expression for YouTube links....[/url]

[color=blue][b][size=12pt][u]Extra Credits Go Out To:[/u][/size][/b][/color]
o [url=http://www.simplemachines.org/community/index.php?action=profile;u=317117]Sapozhnik[/url] for code assistance
o [url=http://www.simplemachines.org/community/index.php?action=profile;u=308325]karavan2[/url] for providing code assistance
o [url=http://www.simplemachines.org/community/index.php?action=profile;u=303481]kelvincool[/url] for Regular Expression assistance

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.10, but should work on SMF 2.1 Beta 3, as well as SMF 2.0 and up.  SMF 2.1 Beta 2 and SMF 1.x will not be supported.

[color=blue][b][size=12pt][u]Changelog[/u][/size][/b][/color]
The changelog has been removed and can be seen at [url=http://www.xptsp.com/board/index.php?topic=50.msg152#msg152]XPtsp.com[/url].

[color=blue][b][size=12pt][u]License[/u][/size][/b][/color]
[quote]Copyright (c) 2015 - 2017, Douglas Orend
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
[/quote]