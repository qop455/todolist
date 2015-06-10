var infoBox; // 訊息 label
var tempBox; // 中間的辨識訊息 text input
var startStopButton; // 「辨識/停止」按鈕
var final_transcript = ''; // 最終的辨識訊息的變數
var recognizing = false; // 是否辨識中

function startButton(event) {
	infoBox = document.getElementById("infoBox"); // 取得訊息控制項 infoBox
	tempBox = document.getElementById("tempBox"); // 取得中間的辨識訊息控制項 tempBox
	startStopButton = document.getElementById("startStopButton"); // 取得「辨識/停止」這個按鈕控制項
	langCombo = document.getElementById("langCombo"); // 取得「辨識語言」這個選擇控制項
	if (recognizing) { // 如果正在辨識，則停止。
		recognition.stop();
	} else { // 否則就開始辨識
		tempBox.value = ''; // 清除中間的辨識訊息
		final_transcript = ''; // 最終的辨識訊息變數
		recognition.lang = langCombo.value; // 設定辨識語言
		recognition.start(); // 開始辨識
	}
}

if (!('webkitSpeechRecognition' in window)) {  // 如果找不到 window.webkitSpeechRecognition 這個屬性
	// 就是不支援語音辨識，要求使用者更新瀏覽器。 
	infoBox.innerText = "Please update the browser to the last version!(Above Chrome v25)";
}
else {
	var recognition = new webkitSpeechRecognition(); // 建立語音辨識物件 webkitSpeechRecognition
	recognition.continuous = true; // 設定連續辨識模式
	recognition.interimResults = true; // 設定輸出中先結果。

	recognition.onstart = function() { // 開始辨識
		recognizing = true; // 設定為辨識中
		startStopButton.value = "Stop recognizing"; // 辨識中...按鈕改為「按此停止」。  
		infoBox.innerText = "recognizing...";  // 顯示訊息為「辨識中」...
	};

	recognition.onend = function() { // 辨識完成
		recognizing = false; // 設定為「非辨識中」
		startStopButton.value = "Start recognizing!";  // 辨識完成...按鈕改為「開始辨識」。
		infoBox.innerText = ""; // 不顯示訊息
	};

	recognition.onresult = function(event) { // 辨識有任何結果時
		var interim_transcript = ''; // 中間結果
		for (var i = event.resultIndex; i < event.results.length; ++i) { // 對於每一個辨識結果
				interim_transcript += event.results[i][0].transcript; // 將其加入中間結果中
		}
		if (interim_transcript.trim().length > 0){ // 如果有中間辨識文字
			tempBox.value = interim_transcript; // 顯示中間辨識文字
		}
	};
}