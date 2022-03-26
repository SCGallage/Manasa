console.log("Works!");

const getSelectedReport = async (e) => {
  if (e.target && e.target.nodeName === "BUTTON") {
      sessionStorage.setItem("meetingId", e.target.value);
  }
  await fetch("http://localhost:80/api/v1/meeting?meetingId="+e.target.value)
      .then(response => response.json())
      .then(data => {
          document.getElementById("report-id").innerHTML = "Meeting ID: "+data[0].id;
          document.getElementById("report-date").innerHTML = "Meeting Date: "+data[0].date;
          document.getElementById("report-time").innerHTML = "Meeting Time: "+data[0].time;
          document.getElementById("report-meeting-type").innerHTML = "Meeting Type: "+data[0].meeting_type;
          console.log(data)
      });
        document.querySelector(".modal-bg").classList.add("display");
}

document.getElementById("pendingReports")
    .addEventListener("click", (e) => getSelectedReport(e));

document.getElementById("submittedReports").addEventListener("click", (e) => getSelectedReport(e));

const submitReport = async () => {
  await fetch("http://localhost:80/api/v1/addSessionReport", {
      method: 'POST',
      mode: "cors",
      cache: "no-cache",
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          meetingId: sessionStorage.getItem("meetingId"),
          remark: document.getElementById("remark").value
      })
  }).then(result => result.json()).then(data => {
      if (data.result === 1)
          window.location.reload();
      window.location.reload();
      console.log(data)
  });
}