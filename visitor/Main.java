package visitor;

public class Main {

    public static void main(String[] args) {
        var anchor = new Anchor();
        anchor.exec(new UnderlyingText());
    }
}
