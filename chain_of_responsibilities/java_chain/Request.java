package chain_of_responsibilities.java_chain;

public class Request {
    private final String type;

    public Request(String type) {
        this.type = type;
    }

    public String getType() {
        return type;
    }
}
