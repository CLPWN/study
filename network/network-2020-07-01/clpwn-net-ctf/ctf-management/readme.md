# clpwn net ctfの構成情報色々

- [ctfサーバ構成](#management)
- [i see](#i-see)
- [asciicmp](#asciicmpi)
- [a rot of txt](#a-rot)
- [終わりに](#end)

## <a id="management"></a>ctfサーバ構成
今回は[Micorosoft Azure](https://azure.microsoft.com/ja-jp/)のクラウドVMで[CTFd](https://github.com/CTFd/CTFd)を動かした。<br>
Micorosoft Azureには、[学生が約750時間VMを無料で利用できる制度](https://azure.microsoft.com/ja-jp/free/students/)がある。<br>
今回はこれを利用して、サーバを構築した。<br>
CTFdの利用は何も難しいことは無い。`git clone`して、`prepare.sh`を実行し、`serve.py`を実行するだけで立ち上がる。ただ、デフォルトではアクセスが`localhost`のみになっていたり、
サービス`port`がよく分からないことになっているので、適宜変更すべき。今回は、以下のように設定した。
```
$ cat -n serve.py
(snip)
    31  app.run(debug=True, threaded=True, host="0.0.0.0", port=80)
```
`host="127.0.0.1"`を`host="0.0.0.0"`にしないと他のマシンからアクセスできない。`port=80`のように設定した`port`でサービスを行うことができる。当たり前だが。このポートをAzureのファイアウォール設定で開けていないとアクセスできない。<br>
セキュリティに関してはあまり設定していない。CTFdを起動したコンソールにはHTTPのアクセスURIが流れる。何か明らかに変なアクセスしてくるやつは、`iptables`で止めた。
`ssh`で色々やってたけど、絶対パスワード認証はダメ。パスワード認証は拒否する設定にした。
そういえば、`iptables`の`policy`がデフォルトで`ACCEPT`になっているので、`policy`は`DROP`に変えて、サービス`port`と必要な場合は`ssh`を開ける設定をした方が良いと思う。(やってなかったけど)


## <a id="i-see"></a>i see
この問題では[Wordpress](https://ja.wordpress.com/)へのログインを見てもらったが、このWordpressはAzureのVMで動かしていた。<br>
Wordpressサーバの構築には[Ubuntu 18.04 LTS に WordPress 5.3 をインストール - Qiita](https://qiita.com/cherubim1111/items/265cfbbe91adb44562d5)を参考にした。<br>
殆ど、デフォルト設定でクソセキュリティだったのですぐ止めた。

## <a id="asciicmpi"></a>asciicmp
この問題は`ping`コマンドの実行中にパケットキャプチャしただけ。<br>
[pingでMTUサイズを調査する：Tech TIPS - ＠IT](https://www.atmarkit.co.jp/ait/articles/0512/17/news017.html)を参考にした。<br>
`ping`の`-f -l <byte>`で`Length`が指定できるらしいが、実際には32bytesくらい増えるみたいなので、コマンドの指定時には[ascii-code]-[32]で指定した。

## <a id="a-rot"></a>a rot of txt
パケットキャプチャ見てデータ復元する系の問題があった方が良いと思い作ってみました。よくあるのはメールの添付ファイル復元だから、最初はそっち系でいこうかと思っていたけれど
意外とメールの設定ってメンドクサイんじゃないか思い始め止めた(やったことないけど)。ちょうど、virtualboxでFTPサーバ立てていたのでそれを利用した。<br>
まず、これは以前からやっていたがVMのWindows 7に[FileZilla](https://filezilla-project.org/)でFTPサーバをセットアップする。<br>
Windows 7は、[GetmyOS](https://www.getmyos.com/name/windows-7)でDLしたものを使用。一応、windows 7はファイアウォールを切った。送信側のマシンとしてはUbuntu 18.04 LTSを使用。両方のマシンをvirtualboxの内部ネットワークで同じネットワークに配置して、virtualboxのdhcpサーバでipアドレスを振る。virtualboxの内部ネットワークでipアドレス振るのは、[Vulnhubをやるための環境設定(05/14更新) - バグをバウンティしてみたい](https://rootreasure.hatenablog.jp/entry/2020/04/26/150842)を参照。<br>
FTPサーバの方はFileZillaでuser anonymousを作って、アクセスする用のフォルダを作成して、フォルダの権限は全部つけた。<br>
ファイル送信は、沢山ファイルを送る仕様したかったので`python`で行った。[Nippon Kaisho システムツール ランダムな文字列作成](https://www.japan9.com/cgi/rand_num.cgi)で作成したランダムな文字列のファイル名リストと、大小文字数字記号を含めた文字列のパスワード用リストを用意する。ファイル名リストには、一つだけ`password`の`rot13`を入れておく。そして、用意したファイル名リストを一行ずつ参照したファイル名のファイルを作成しながら、パスワード用リストから一行づつ読み込みファイルに書き込む操作を行い各々テキストモードでFTPで送信する。この途中で、バイナリモードで`flag.zip`を送信する。雑だが[ソースコード](./a_rot_of_txt.py)も置いておく。


# <a id="end"></a>終わりに
セキュリティガバガバだったので、常にログチェックしてヒヤヒヤしてた。自分が設定したflagが間違っていたら、あとで間違いとされてしまった提出分を正解にすることも可能だった。
次回のCTFやる場合は、別のCTFプラットフォームを利用する予定。
