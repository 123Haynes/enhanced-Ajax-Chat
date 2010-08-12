/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

// Ajax Chat language Object:
var ajaxChatLang = {
	
	login: 'Korisnik %s prijavio se u brbljanje.',
	logout: 'Korisnik %s odjavio se iz brbljanja.',
	logoutTimeout: 'Korisnik %s je odjavljen (neaktivnost).',
	logoutIP: 'Korisnik %s je odjavljen (nepravilna IP adresa).',
	logoutKicked: 'Korisnik %s je odjavljen (prognan).',
	channelEnter: 'Korisnik %s pristupa kanalu.',
	channelLeave: 'Korisnik %s napušta kanal.',
	privmsg: '(šapuće)',
	privmsgto: '(šapuće korisniku %s)',
	invite: 'Korisnik %s poziva vas da se pridružite kanalu %s.',
	inviteto: 'Vaš poziv korisniku %s da se pridruži kanalu %s je poslan.',
	uninvite: 'Korisnik %s povukao je svoj poziv za kanal %s.',
	uninviteto: 'Vaš opoziv korisniku %s za pridruživanje kanalu %s je poslan.',	
	queryOpen: 'Otvoren je privatni kanal za %s.',
	queryClose: 'Privatni kanal za %s je zatvoren.',
	ignoreAdded: 'Korisnik %s je dodan na popis ignoriranih.',
	ignoreRemoved: 'Korisnik %s je uklonjen s popisa ignoriranih.',
	ignoreList: 'Ignorirani korisnici:',
	ignoreListEmpty: 'Nema ignoriranih korisnika.',
	who: 'Prisutni korisnici:',
	whoChannel: 'Prisutni korisnici u kanalu %s.',
	whoEmpty: 'U odabranom kanalu nema prisutnih korisnika.',
	list: 'Dostupni kanali:',
	bans: 'Zabranjeni korisnici:',
	bansEmpty: 'Nema zabranjenih korisnika.',
	unban: 'Opozvana je zabrana korisnika %s.',
	whois: 'Korisnik %s - IP adresa:',
	whereis: 'Korisnik %s je u kanalu %s.',
	roll: 'Korisnik %s baca %s i dobiva %s.',
	nick: 'Korisnik %s je sad poznat kao %s.',
	passwordUpdated: 'Password updated for %s',
	toggleUserMenu: 'Prebaci korisnički zbornik za %s',
	userMenuLogout: 'Odjava',
	userMenuWho: 'Ispiši prisutne korisnike',
	userMenuList: 'Ispiši dostupne kanale',
	userMenuAction: 'Aktivnost',
	userMenuRoll: 'Baci kocku',
	userMenuNick: 'Promijeni korisničko ime',
	userMenuEnterPrivateRoom: 'Pristupi privatnoj sobi',
	userMenuSendPrivateMessage: 'Pošalji privatnu poruku',
	userMenuDescribe: 'Pošalji privatnu aktivnost',
	userMenuOpenPrivateChannel: 'Otvori privatni kanal',
	userMenuClosePrivateChannel: 'Zatvori privatni kanal',
	userMenuInvite: 'Pozovi',
	userMenuUninvite: 'Opozovi',
	userMenuIgnore: 'Ignoriraj / Prihvati',
	userMenuIgnoreList: 'Ispiši ignorirane korisnike',
	userMenuWhereis: 'Prikaži kanal',
	userMenuKick: 'Prognaj / Zabrani',
	userMenuBans: 'Ispiši zabranjene korisnike',
	userMenuWhois: 'Prikaži IP',
	userMenuPassword: 'Change password',
	unbanUser: 'Opozovi zabranu korisnika %s.',
	joinChannel: 'Pridruži se kanalu %s',
	cite: 'Korisnik %s je rekao:',
	urlDialog: 'Unesite URL adresu web-stranice:',
	deleteMessage: 'Izbriši ovu poruku',
	deleteMessageConfirm: 'Želite li zaista izbrisati ovu poruku?',
	errorCookiesRequired: 'Ovo brbljanje zahtjeva omogućene kolačiće.',
	errorUserNameNotFound: 'Pogreška: Korisnik %s nije pronađen.',
	errorMissingText: 'Pogreška: Nedostaje tekst poruke.',
	errorMissingUserName: 'Pogreška: Nedostaje korisničko ime.',
	errorInvalidUserName: 'Pogreška: Nepravilno korisničko ime.',
	errorMissingPassword: 'Error: Password is required',
	errorUserNameInUse: 'Pogreška: Korisničko ime već je u upotrebi.',
	errorMissingChannelName: 'Pogreška: Nedostaje naziv kanala.',
	errorInvalidChannelName: 'Pogreška: Nepravilan naziv kanala: %s',
	errorPrivateMessageNotAllowed: 'Pogreška: Privatne poruke nisu dopuštene.',
	errorInviteNotAllowed: 'Pogreška: Nemate dopuštenja za pozivanje drugih osoba u ovaj kanal.',
	errorUninviteNotAllowed: 'Pogreška: Nemate dopuštenja za opozivanje drugih osoba u ovom kanalu.',
	errorNoOpenQuery: 'Pogreška: Nema otvorenog privatnog kanala.',
	errorKickNotAllowed: 'Pogreška: Nemate dopuštenja za progon korisnika %s.',
	errorCommandNotAllowed: 'Pogreška: Naredba nije dopuštena: %s',
	errorUnknownCommand: 'Pogreška: Nepoznata naredba: %s',
	errorMaxMessageRate: 'Pogreška: Premašili ste najveći dopušteni broj poruka u minuti.',
	errorConnectionTimeout: 'Pogreška: Neaktivna veza. Pokušajte ponovo.',
	errorConnectionStatus: 'Pogreška: Stanje veze: %s',
	errorSoundIO: 'Pogreška: Učitavanje datoteke zvuka nije uspjelo (Flash IO pogreška).',
	errorSocketIO: 'Pogreška: Povezivanje s priključkom poslužitelja nije uspjelo (Flash IO pogreška).',
	errorSocketSecurity: 'Pogreška: Povezivanje s priključkom poslužitelja nije uspjelo (Flash sigurnosna pogreška).',
	errorDOMSyntax: 'Pogreška: Nepravilna DOM sintaksa (DOM ID: %s).'
	
}
