package chain_of_responsibilities.java_chain;

interface Handler {
    void setNextHandler(Handler nextHandler);
    void handleRequest(Request request);
}
