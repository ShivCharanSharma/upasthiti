const video = document.getElementById('video')

Promise.all([
	faceapi.nets.ssdMobilenetv1.loadFromUri('models'),
	//  faceapi.nets.tinyFaceDetector.loadFromUri('./models'),
	faceapi.nets.faceLandmark68Net.loadFromUri('models'),
	faceapi.nets.faceRecognitionNet.loadFromUri('models'),
	//  faceapi.nets.faceExpressionNet.loadFromUri('./models')
]).then(startVideo)

function startVideo() {
	navigator.getUserMedia(
		{ video: {facingMode:"environment"},audio:false },
		stream => video.srcObject = stream,
		err => console.error(err)
	)
}

const labels = ['shiv'/*'Black Widow', 'Captain America', 'Captain Marvel', 'Hawkeye', 'Jim Rhodes', 'Thor', 'Tony Stark'*/]

let attendance=[];
labels.map( label => {
	attendance[label]=0;/*.push({ 'rollNo':label, 'weight':0});*/
});
console.log(attendance);

video.addEventListener('play',async () => {
	const labeledFaceDescriptors =await  loadLabeledImages()
	console.log(labeledFaceDescriptors);
	const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
	console.log(faceMatcher);
	const canvas = faceapi.createCanvasFromMedia(video)
	document.body.append(canvas)
//	console.log(vedio.width);
	const displaySize = { width: video.width, height: video.height }
	faceapi.matchDimensions(canvas, displaySize)
	setInterval(async () => {
		const detections = await faceapi.detectAllFaces(video/*, new faceapi.TinyFaceDetectorOptions()*/).withFaceLandmarks().withFaceDescriptors()/*.withFaceExpressions()*/
		const resizedDetections = faceapi.resizeResults(detections, displaySize)
		canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
		const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))

		//  for(const [key,value] of Object.entries(attendance){
		//  console.log(results[0]._label);
		results.forEach((result, i) => {
			if(typeof result._label !== 'undefined'){ 
				if(labels.includes(result._label))
				{
					attendance[result._label]++;
				}
			}
			console.log(attendance);
			console.log(result.toString());
			const box = resizedDetections[i].detection.box
			const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
			drawBox.draw(canvas)
		})
		/*   faceapi.draw.drawDetections(canvas, resizedDetections)
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections)*/
	}, 50)
})

function loadLabeledImages() {
	//  const labels = ['shiv'/*'Black Widow', 'Captain America', 'Captain Marvel', 'Hawkeye', 'Jim Rhodes', 'Thor', 'Tony Stark'*/]
	return Promise.all(
		labels.map(async label => {
			const descriptions = []
			//     for (let i = 1; i <= 2; i++) {
			const img = await faceapi.fetchImage('image/shiv.jpg'/*`https://raw.githubusercontent.com/WebDevSimplified/Face-Recognition-JavaScript/master/labeled_images/${label}/${i}.jpg`*/)
			const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
			descriptions.push(detections.descriptor)
			//   }

			return new faceapi.LabeledFaceDescriptors(label, descriptions)
		})
	)
}

var submitBtn = document.getElementById("submit");
submitBtn.addEventListener('click',function(event){

	var vedio= document.getElementById('video');
	vedio.pause();
	document.removeEventListener
	document.body.removeChild(vedio);
	var table =document.createElement('table');
	var tableContent="<tr><th> Name of present Student</th></tr>";
	attendance.forEach((weight,name)=>{
		if(weight>0){
			tableContent +="<tr><td>"+name+"</td></tr>";
		}
	});
	table.innerHTML=tableContent;
	document.body.addChild(table);
})
