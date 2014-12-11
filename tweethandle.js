function getWordsFromArray(array) {
	var str;
	for(var tweet in array) {
		str += tweet.text + " ";
	}
	return str.split(" ");
}

function getWords(tweet) {
	var str = tweet.text;
	return str.split(" ");	
}

function parseHashtags(object) {
	var hashtags = object.hashtags;
	var list = [""];
	
	for(int i = 0; i<hashtags.length; i++) {
		list.push(hashtags[i].text);
	}
	
	return list;
}