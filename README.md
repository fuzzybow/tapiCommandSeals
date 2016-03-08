# tapiCommandSeals
Simple Image Based User Verification Proof of Concept

This is a simple proof of concept steganographic verification program. It requires [PHP-ed25519](https://github.com/encedo/php-ed25519-ext) to be installed.

This is designed for the EVE Online community [Test Alliance Please Ignore](https://pleaseignore.com/) for identification of non-member users, for espionage or other reasons of not having public ties.

There is no upload function present as of right now, and the names are directly saved into the image name. There is currently an error thrown if on the decoding page a name that is not present is entered.

This also uses the [Morpheus Library](https://github.com/pyrou/morpheus) which is currently residing in the composer folder included in the repository.
