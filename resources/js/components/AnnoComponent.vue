<template>
  <div class="card-body">
    <div v-if="message" class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ message }}</strong>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col opacity-75">
            <table cellpadding="10px">
              <tr>
                <td>Checkup ID: {{ checkup.id }}</td>
                <td>Checkup Time: {{ checkup.time }}</td>
                <td>Patient ID: {{ checkup.patient_id }}</td>
                <td>Age: {{ checkup.age }}</td>
                <td>Gender: {{ checkup.gender }}</td>
              </tr>
            </table>

          </div>
        </div>
        <hr class="my-1" />
        <div class="row">
          <div class="col">
            <h5><b>History and Symptoms</b></h5>
            <p>{{ checkup.history_and_symptoms }}</p>

            <h5><b>Physique</b></h5>
            <p>{{ checkup.physique }}</p>

            <h5><b>Chinese Diagnosis</b></h5>
            <p>{{ checkup.chinese_diagnosis }}</p>

            <h5><b>Western Diagnosis</b></h5>
            <p>{{ checkup.western_diagnosis }}</p>

            <h5><b>Process</b></h5>
            <p>{{ checkup.process }}</p>

            <h5><b>Base</b></h5>
            <p>{{ checkup.base }}</p>

            <h5><b>Acupunture</b></h5>
            <p>{{ checkup.acupuncture }}</p>

          </div>
        </div>
        <hr class="my-1" />
        <div class="row">
          <div class="col">
            <h5><b>Clinical Tests</b></h5>
            <p>{{ checkup.test_id }}</p>
          </div>
        </div>
        <hr class="my-1" />
        <div class="text-center checkup-rating">
          <h4>Rate Patient's condition</h4>
          <div class="text-center mb-3">
            <div class="d-inline mx-3">Bad</div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio4">4</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio5">5</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio6">6</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio7">7</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio8"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio8">8</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio9"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio9">9</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio10"
                value="patientCondition" />
              <label class="form-check-label" for="inlineRadio10">10</label>
            </div>
            <div class="d-inline mx-3">Good</div>
          </div>
          <div v-if="loading" class="col col-md-1">
            <div class="spinner-border text-success" style="display: inline-block" role="status">
              <!-- <span class="sr-only">Loading...</span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col d-flex">
        <a :href="previouseUrl" type="button" class="btn btn-secondary m-1">
          PREVIOUS
        </a>
        <a :href="nextUrl" type="button" class="btn btn-secondary m-1">
          SKIP
        </a>
        <div style="width: 2px; background-color: #cccccc; margin: 6px 8px"></div>
        <button @click="submitHandler" type="button" class="btn btn-primary m-1">
          SAVE AND NEXT
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["checkup", "baseurl", "csrf", "user"],
  data() {
    return {
      message: "",
      loading: false,
      skipUrl: "",
      previouseUrl: "",
      removeUrl: "",
      nextUrl: "",
    };
  },
  methods: {
    submitHandler() {
      const route = this.baseurl + "/sentence/edit/" + this.checkup.id;
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json; charset=UTF-8");
      myHeaders.append("X-CSRF-TOKEN", this.csrf);
      fetch(route, {
        method: "POST",
        headers: myHeaders,
        body: JSON.stringify({
          checkup: this.checkup,
        }),
      })
        .then((res) => {
          if (res.status === 200) {
            window.location.reload();
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
        });
    },
    onSkip(e) {
      e.preventDefault();
      fetch(this.skipUrl, {
        method: "GET",
        headers: new Headers(),
      })
        .then((res) => {
          if (res.status === 200) {
            console.log(res);
            this.loading = false;
            window.location.href = this.baseurl + "/annotation";
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
          this.loading = false;
        });
    },
  },
  mounted() {
    this.skipUrl = `${this.baseurl}/sentence/skip/${this.checkup.id}`;
    this.previouseUrl = `${this.baseurl}/sentence/previouse/${this.checkup.id}`;
  },
};
</script>

<style></style>