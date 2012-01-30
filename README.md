The Filecrypt Application
=========================

This repository contains the PHP logic (well, the whole solution) for the website [www.filecrypt.ws](https://www.filecrypt.ws)

As it stands, we aim to hit the following goals:

Outlined Features
-----------------
-   Simple upload form (duh)
-   Optional symmetric encryption, key generated via Javascript
-   Link / Download expiry
-   Secure removal of expired files
-   Emergency deletion link
-   Remove after *n* downloads


Future Planned Features
-----------------------
-   Java applet for client-side encryption
-   Email warning / notification system
-   Apply symmetric encryption while sensitive data is in main memory (RAM)


Technical Security Details
--------------------------
-   Obviously we assume all communication to operate under an SSL connection, preventing someone sniffing the line in the clear.

-   Symmetric encryption utilizes the Tarsnap utility program *scrypt*\*, providing strong cryptographic methods for storage.

-   If symmetric encryption is used, it is applied after PHP has written the file to the PHP temporary directory, and before the file is moved to permanent storage on disk. *Future versions plan to encrypt the file in memory, before written to disk at all.*

-   The *srm* utility is used to apply a 7-pass wipe to the file after link expiry.

-   The file's upload link is a random 128-char string, which prevents automatic scraping of guessable URLs. The string is not related to the file what-so-ever.

-   Link expiry is checked by a cron-job on a minutely basis

-   Filecrypt does not discriminate between a correct and incorrect symmetric key. The file is "decrypted" and served as a download either way.

\**See Pitfall #2*

Pitfalls for The Truly Paranoid
-------------------------------
1.  __Trusting us with your upload in plaintext is ridiculous:__

    For starters, relying on SSL/TLS for transport safety isn't the best considering the state of affairs. Recent press about DigiNotar will illustrate this issue.

    Second, you're letting us store your files in the clear. This means we can peek at your data, our ISP can peak at your data, and an adversary who compromises our server within your upload period can also see your data.

    We *highly suggest* you encrypt your data before we see it. This provides the highest level of assurance of privacy.


2.  __Trusting us to encrypt your upload in plaintext is just as bad:__

    Who said we're good people? In the end you have to trust us to take care of your data, privacy, and security. We may lie, cheat, and steal.

    We try our best to be transparent by providing the source code on here GitHub but that doesn't prevent us from running our own modified version of our software. Backdoors, snooping, anything can happen and your can't truly verify we're not doing it. *You have to take our word for it.*

    Again, we *highly suggest* you do your own encryption. Notice a pattern?


3.  __Trusting our future Java applet to properly encrypt your data before uploading it to our servers is horrible:__

    In future versions, we do plan to provide a Java applet so you can encrypt your data client-side. The problem again comes down to trust (that, and Java just sucks).

    We may implement our Java crypto wrong, we may backdoor the Java, Java may be insecure. Again! Use your own encryption outside of us.


### What's the lesson here? ###
*Don't trust us!* If you want the highest level of assurance of safety, encrypt your data using well-known, open-source software like *OpenSSL*, *GnuPG*, or *scrypt* before sending it to us. This is the only way to ensure that we or anything upstream doesn't snoop about your data.


Contribute
----------

If you're looking to join up, send an email to <admin@filecrypt.ws> ([520B9A41](https://www.filecrypt.ws/keys/520b9a41.txt)) or <frank@filecrypt.ws> ([FD2EA3E8](https://www.filecrypt.ws/keys/fd2ea3e8.txt)) or mention [@filecrypt](https://www.twitter.com/filecrypt) to get in touch. Of course feel free to fork and file pull requests.

