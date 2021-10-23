<div class="modal-bg">
    <div class="card-container">
        <svg
            class="close-btn"
            width="27"
            height="28"
            viewBox="0 0 27 28"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M20.25 7L6.75 21"
                stroke="black"
                stroke-width="3"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M6.75 7L20.25 21"
                stroke="black"
                stroke-width="3"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
        <div class="card-header">
            <h4 class="card-selection">Requests</h4>
            <h4 class="card-selection">Callers</h4>
        </div>
        <div class="card-tab"></div>
        <div class="card-content">
            <div
                data-requestid="2343"
                id="card-container"
                class="request-card-container"
            >
                <div class="request-card">
                    <div class="card-icon">
                        <!-- <span class="picture"></span> -->
                        <img class="picture" src="./assets/img/propic.png" alt="" />
                    </div>
                    <span class="card-text">
                <h4 class="request-name">Heather Chapman</h4>
              </span>
                    <div class="button-set" data-requestid="2343">
                        <button
                            class="approve-btn"
                            onclick="getRequestId(this.parentElement.dataset.requestid)"
                        >
                            Approve
                        </button>
                        <button class="reject-btn">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
