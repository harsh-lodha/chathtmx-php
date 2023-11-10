# api.py
from flask import Flask, request, jsonify
from transformers import pipeline

app = Flask(__name__)

# Load the text generation model
generator = pipeline("text-generation")

@app.route("/generate_text", methods=["POST"])
def generate_text():
    data = request.get_json()
    prompt = data["prompt"]
    
    if prompt:
        generated_text = generator(prompt, max_length=50, do_sample=True)
        return jsonify({"generated_text": generated_text[0]["generated_text"]})
    else:
        return jsonify({"error": "Prompt is required."})

if __name__ == "__main__":
    app.run(debug=True)
